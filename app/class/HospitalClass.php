<?php
/**
* Secure login/registration user class.
*/


class HospitalClass extends PdoDatabse {
	/** @var object $pdo Copy of PDO connection */
	protected $pdo;
	/** @var object of the logged in user */
	private $user;
	/** @var string error msg */
	public $msg;
	/** @var int number of permitted wrong login attemps */
	private $permitedAttemps = 5;

    /**
    * Connection init function
    * @param string $conString DB connection string.
    * @param string $user DB user.
    * @param string $pass DB password.
    *
    * @return bool Returns connection success.
    */

    public function __construct()
    {
        parent::__construct();
        $this->table = 'hospital_authority';
        
    }


    private function getPersonalInfo($id)
    {

        if (is_null($this->pdo)) {
            $this->msg = 'Connection did not work out!';
            return [];
        } else {
            $pdo = $this->pdo;
            $stmt = $pdo->prepare('SELECT * FROM users u,hospital_authority h WHERE u.id = ? and u.id = h.user_id');
            $stmt->execute([$id]);
            $user = $stmt->fetch();
            
            foreach($user as $key => $value){
                if($key=='password') continue;
                $_SESSION['user'][$key] = $value;
            }
            return $_SESSION['user'];
        }
    }

    public function updateProfile($data)
    {
        // print_r($data);exit;
        
        if ($data) {
            $stmt = $this->pdo->prepare('UPDATE hospital_authority SET author = ?, name = ?, email = ?, phone = ?, job_title = ?,  address = ?, gender = ? WHERE user_id = ?');
            try {
                if ($stmt->execute([
                    $data['author'],
                    $data['name'],
                    $data['email'],
                    $data['phone'],
                    $data['job_title'],
                    $data['address'],
                    $data['gender'],
                    $_SESSION['user']['user_id'],
                ])) {
                } else {
                    throw new \Exception("Profile Info not updated");
                }
            } catch (\Exception $e) {
                // log error
                echo $e;
                exit;
            }
        }
    }

    public function general()
    {
        // print_r($_SESSION['user']);exit;
		if(!isset($_SESSION['user']['user_id'])){
			$this->helper->error(true);
        }
        
        $id = $_SESSION['user']['user_id'];
        $user = $this->getPersonalInfo($id);
        $user['orders'] = $this->order->allNew($id);

		$user['notice'] = $this->notice->allNew($id);

		// need to upgrade this
		// get all product for all orders, now it is only storing one orders product
		foreach($user['orders'] as $key=>$order){
			$user['products'][$key] = $this->user->getProductsByOrderToken($order['order_token']);			
		}
			// print_r($user['products']);exit;
		

		if(isset($user['products'])){

			foreach(@$user['products'] as $data){
				foreach(@$data as $datum){
				$product = new Product($datum->product_id);
				$datum->slug = $product->slug;
				$datum->price = $product->price;
				$datum->name = $product->name;
			}
		}

		}
		return $user;
    }
    public function all(){
        if(is_null($this->pdo)){
            $this->msg = 'Connection did not work out!';
            return [];
        }else{
            $pdo = $this->pdo;
            $stmt = $pdo->prepare('SELECT * FROM '.$this->table.' WHERE 1');
            $stmt->execute();
            $result = $stmt->fetchAll(); 
            return $result; 
        }
    }

    /**
    * Return the logged in user.
    * @return user array data
    */
    public function getUser(){
    	return $this->user;
    }

    /**
    * Login function
    * @param string $email User email.
    * @param string $password User password.
    *
    * @return bool Returns login success.
    */
    public function login($email, $password){
    	if (is_null($this->pdo)) {
    		$this->msg = 'Connection did not work out!';
    		return false;
    	} else {
    		$pdo = $this->pdo;
    		$stmt = $pdo->prepare('SELECT * FROM users WHERE email = ? and confirmed = 1 and user_role = ? limit 1');
    		$stmt->execute([$email,'hospital']);
    		$user = $stmt->fetch();

    		if(password_verify($password,$user['password'])){
    			if($user['wrong_logins'] <= $this->permitedAttemps){
    				$this->user = $user;
    				session_regenerate_id();
    				$_SESSION['user']['id'] = $user['id'];
    				$_SESSION['user']['fname'] = $user['fname'];
    				$_SESSION['user']['lname'] = $user['lname'];
    				$_SESSION['user']['email'] = $user['email'];
    				$_SESSION['user']['user_role'] = $user['user_role'];
    				return true;
    			}else{
    				$this->msg = 'This user account is blocked, please contact our support department.';
    				return false;
    			}
    		}else{
    			$this->registerWrongLoginAttemp($email);
    			$this->msg = 'Invalid login information or the account is not activated.';
    			return false;
    		} 
    	}
    }

    /**
    * Register a new user account function
    * @param string $email User email.
    * @param string $fname User first name.
    * @param string $lname User last name.
    * @param string $pass User password.
    * @return boolean of success.
    */
    public function registration($name,$email,$fname,$lname,$pass){
        
        $pdo = $this->pdo;
    	if($this->checkEmail($email)){
    		$this->msg = 'This email is already taken.';
    		return false;
    	}
    	if(!(isset($email) && isset($fname) && isset($lname) && isset($pass) && filter_var($email, FILTER_VALIDATE_EMAIL))){
    		$this->msg = 'Inesrt all valid requered fields.';
    		return false;
    	}

    	$pass = $this->hashPass($pass);
    	$confCode = $this->hashPass(date('Y-m-d H:i:s').$email);
    	$stmt = $pdo->prepare('INSERT INTO users (fname, lname, email, password, confirm_code, user_role, confirmed) VALUES (?, ?, ?, ?, ?, ?, ?)');

    	if($stmt->execute([$fname,$lname,$email,$pass,$confCode,'hospital', 1])){
    		if($this->sendConfirmationEmail($email)){
    			return true;
    		}else{
    			$this->msg = 'confirmation email sending has failed.';
    			return false; 
    		}
    	}else{
    		$this->msg = 'Inesrting a new user failed.';
    		return false;
    	}
    }

    /**
    * Email the confirmation code function
    * @param string $email User email.
    * @return boolean of success.
    */
    private function sendConfirmationEmail($email){
    	$pdo = $this->pdo;
    	$stmt = $pdo->prepare('SELECT confirm_code FROM users WHERE email = ? limit 1');
    	$stmt->execute([$email]);
    	$code = $stmt->fetch();

    	$subject = 'Confirm your registration';
    	$message = 'Please confirm you registration by clicking <a href="http://23.226.70.142/users/confirm/'.$email.'/'.$code['confirm_code'].'">HERE</a>';
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From:Medical Shop BD<admin@medicalshopbd.com>' . "\r\n" .
    'Reply-To:  info@medicalshopbd.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    	if(mail($email, $subject, $message, $headers)){
		return true;
    	}else{ 
    		return false;
    	}
    }

    /**
    * Activate a login by a confirmation code and login function
    * @param string $email User email.
    * @param string $confCode Confirmation code.
    * @return boolean of success.
    */
    public function emailActivation($email,$confCode){
    	$pdo = $this->pdo;
    	$stmt = $pdo->prepare('UPDATE users SET confirmed = 1 WHERE email = ? and confirm_code = ?');
    	$stmt->execute([$email,$confCode]);
    	if($stmt->rowCount()>0){
    		$stmt = $pdo->prepare('SELECT id, fname, lname, email, wrong_logins, user_role FROM users WHERE email = ? and confirmed = 1 limit 1');
    		$stmt->execute([$email]);
    		$user = $stmt->fetch();

    		$this->user = $user;
    		session_regenerate_id();
    		if(!empty($user['email'])){
    			$_SESSION['user']['id'] = $user['id'];
    			$_SESSION['user']['fname'] = $user['fname'];
    			$_SESSION['user']['lname'] = $user['lname'];
    			$_SESSION['user']['email'] = $user['email'];
    			$_SESSION['user']['user_role'] = $user['user_role'];
    			return true;
    		}else{
    			$this->msg = 'Account activitation failed.';
    			return false;
    		}            
    	}else{
    		$this->msg = 'Account activitation failed.';
    		return false;
    	}
    }

    /**
    * Password change function
    * @param int $id User id.
    * @param string $pass New password.
    * @return boolean of success.
    */
    public function passwordChange($id,$pass){
    	$pdo = $this->pdo;
    	if(isset($id) && isset($pass)){
    		$stmt = $pdo->prepare('UPDATE users SET password = ? WHERE id = ?');
    		if($stmt->execute([$id,$this->hashPass($pass)])){
    			return true;
    		}else{
    			$this->msg = 'Password change failed.';
    			return false;
    		}
    	}else{
    		$this->msg = 'Provide an ID and a password.';
    		return false;
    	}
    }


    /**
    * Assign a role function
    * @param int $id User id.
    * @param int $role User role.
    * @return boolean of success.
    */
    public function assignRole($id,$role){
    	$pdo = $this->pdo;
    	if(isset($id) && isset($role)){
    		$stmt = $pdo->prepare('UPDATE users SET role = ? WHERE id = ?');
    		if($stmt->execute([$id,$role])){
    			return true;
    		}else{
    			$this->msg = 'Role assign failed.';
    			return false;
    		}
    	}else{
    		$this->msg = 'Provide a role for this user.';
    		return false;
    	}
    }



    /**
    * User information change function
    * @param int $id User id.
    * @param string $fname User first name.
    * @param string $lname User last name.
    * @return boolean of success.
    */
    public function userUpdate($id,$fname,$lname){
    	$pdo = $this->pdo;
    	if(isset($id) && isset($fname) && isset($lname)){
    		$stmt = $pdo->prepare('UPDATE users SET fname = ?, lname = ? WHERE id = ?');
    		if($stmt->execute([$id,$fname,$lname])){
    			return true;
    		}else{
    			$this->msg = 'User information change failed.';
    			return false;
    		}
    	}else{
    		$this->msg = 'Provide a valid data.';
    		return false;
    	}
    }

    /**
    * Check if email is already used function
    * @param string $email User email.
    * @return boolean of success.
    */
    private function checkEmail($email){
    	$pdo = $this->pdo;
    	$stmt = $pdo->prepare('SELECT id FROM users WHERE email = ? limit 1');
    	$stmt->execute([$email]);
    	if($stmt->rowCount() > 0){
    		return true;
    	}else{
    		return false;
    	}
    }


    /**
    * Register a wrong login attemp function
    * @param string $email User email.
    * @return void.
    */
    private function registerWrongLoginAttemp($email){
    	$pdo = $this->pdo;
    	$stmt = $pdo->prepare('UPDATE users SET wrong_logins = wrong_logins + 1 WHERE email = ?');
    	$stmt->execute([$email]);
    }

    /**
    * Password hash function
    * @param string $password User password.
    * @return string $password Hashed password.
    */
    private function hashPass($pass){
    	return password_hash($pass, PASSWORD_DEFAULT);
    }

    /**
    * Print error msg function
    * @return void.
    */
    public function printMsg(){
    	print $this->msg;
    }

    /**
    * Logout the user and remove it from the session.
    *
    * @return true
    */
    public function logout() {
    	$_SESSION['user'] = null;
    	session_regenerate_id();
    	return true;
    }



    /**
    * List users function
    *
    * @return array Returns list of users.
    */
    public function listUsers(){
    	if(is_null($this->pdo)){
    		$this->msg = 'Connection did not work out!';
    		return [];
    	}else{
    		$pdo = $this->pdo;
    		$stmt = $pdo->prepare('SELECT id, fname, lname, email FROM users WHERE confirmed = 1');
    		$stmt->execute();
    		$result = $stmt->fetchAll(); 
    		return $result; 
    	}
    }

    public function getInfo(int $id){
        if(is_null($this->pdo)){
            $this->msg = 'Connection did not work out!';
            return [];
        }else{
            $pdo = $this->pdo;
            $stmt = $pdo->prepare('SELECT id, fname, lname, email FROM users WHERE id = ? AND confirmed = 1');
            $stmt->execute([$id]);
            $result = $stmt->fetchObject(); 
            return $result; 
        }
    }

    public function getOrders(int $id){
        if(is_null($this->pdo)){
            $this->msg = 'Connection did not work out!';
            return [];
        }else{
            $pdo = $this->pdo;
            $stmt = $pdo->prepare('SELECT * FROM `order` WHERE user_id = ?');
            $stmt->execute([$id]);
            $result = $stmt->fetchObject(); 
            return $result; 
        }
    }

    public function getProductsByOrderToken(String $token){
        if(is_null($this->pdo)){
            $this->msg = 'Connection did not work out!';
            return [];
        }else{
            $pdo = $this->pdo;
            $stmt = $pdo->prepare('SELECT * FROM `order_product` WHERE order_token = ?');
            $stmt->execute([$token]);
            $result = $stmt->fetchAll(PDO::FETCH_OBJ); 
            return $result; 
        }
    }

        public function getNotice(int $id){
        if(is_null($this->pdo)){
            $this->msg = 'Connection did not work out!';
            return [];
        }else{
            $pdo = $this->pdo;
            $stmt = $pdo->prepare('SELECT * FROM notice WHERE user_id = ? AND new = 1');
            $stmt->execute([$id]);
            $result = $stmt->fetchObject(); 
            return $result; 
        }
    }

    /**
    * Simple template rendering function
    * @param string $path path of the template file.
    * @return void.
    */
    public function render($path,$vars = '') {
    	ob_start();
    	include($path);
    	return ob_get_clean();
    }

    /**
    * Template for index head function
    * @return void.
    */
    public function indexHead() {
    	print $this->render(indexHead);
    }

    /**
    * Template for index top function
    * @return void.
    */
    public function indexTop() {
    	print $this->render(indexTop);
    }

    /**
    * Template for login form function
    * @return void.
    */
    public function loginForm() {
    	print $this->render(loginForm);
    }

    /**
    * Template for activation form function
    * @return void.
    */
    public function activationForm() {
    	print $this->render(activationForm);
    }

    /**
    * Template for index middle function
    * @return void.
    */
    public function indexMiddle() {
    	print $this->render(indexMiddle);
    }

    /**
    * Template for register form function
    * @return void.
    */
    public function registerForm() {
    	print $this->render(registerForm);
    }

    /**
    * Template for index footer function
    * @return void.
    */
    public function indexFooter() {
    	print $this->render(indexFooter);
    }

    /**
    * Template for user page function
    * @return void.
    */
    public function userPage() {
    	$users = [];
    	if($_SESSION['user']['user_role'] == 2){
    		$users = $this->listUsers();
    	}
    	print $this->render(userPage,$users);
    }
}

