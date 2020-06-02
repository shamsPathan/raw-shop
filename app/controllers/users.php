<?php

include_once '../app/class/user.class.php';
include_once '../app/class/DoctorClass.php';
include_once '../app/class/PatientClass.php';
include_once '../app/class/HospitalClass.php';
include_once '../app/class/review.php';
include_once '../app/class/Product.php';


class Users extends Controller
{


	function __construct()
	{
		parent::__construct(); //with database
		$this->user = new User();
		$this->doctor = new DoctorClass();
		$this->patient = new PatientClass();
		$this->hospital = new HospitalClass();



		//$this->menuArray 	= $this->getMenus();
		//$this->submenuArray = $this->getSubmenus(1);
	}

	public function index()
	{
		$this->login();
	}

	public function addReview()
	{

		if (!isset($_POST['name']) || !$_SESSION['user'] ?? null || !($_SESSION['user']['user_role'] == 1)) {
			$this->helper->error(true);
		}

		foreach ($_POST as $key => $value) {
			$_POST[$key] = $this->helper->sanitizeString($value);
		}

		$data['name'] = $_POST['name'] ?? null;
		$data['email'] = $_POST['email'] ?? null;
		$data['productSlug'] = $_POST['product'] ?? null;
		$data['userId'] = null;
		$data['text'] = $_POST['text'] ?? null;

		$review = new Review($data);

		if ($review->save()) {
			header("Location:/ui/product/" . $data['productSlug']);
		} else {
			$_SESSION['error']['review'] = "Review not saved";
			header("Location:/ui/product/" . $data['productSlug']);
		}
	}

	public function login($data = null)
	{
		if ($_SESSION['user']['fname'] ?? null) {
			header("LOCATION:/");
		} else {
			$this->data['menue'] = $this->model->getDpt();
			$this->view->showLoginPage($this->data, $this->model);
		}
	}

	public function logout($value = '')
	{

		if ($this->user->logout() === true) {
			header("LOCATION:/");
		}
	}

	private function gotoIndex($success = 'Operation successfull')
	{
		$_SESSION['success'] = $success;
		return header("LOCATION:/");
	}

	public function goreg($value = '')
	{
		if (!isset($_POST['email'])) {
			$this->helper->error(true);
		}

		if ($_POST['fname'] ?? null && $_POST['lname'] ?? null && $_POST['email'] ?? null && $_POST['mobile'] ?? null && $_POST['password'] ?? null && $_POST['password_confirm'] ?? null) {

			$type = (string) $_POST['type'];
			$name = (string) $_POST['name'] ?? '';
			$email = (string) $_POST['email'];
			$fname = (string) $_POST['fname'];
			$lname = (string) $_POST['lname'];
			$pass = (string) $_POST['password'];
			$mobile = (string) $_POST['mobile'];
			$confirmPass = (string) $_POST['password_confirm'];

			if ($pass === $confirmPass) {
				switch ($type) {
					case 'user':
						// echo $email;exit;
						$this->user->registration($email, $fname, $lname, $pass);
						echo $this->user->msg;
						break;
					case 'doctor':
						$this->doctor->registration($email, $fname, $lname, $pass);
						echo $this->user->msg;
						break;
					case 'patient':
						$this->patient->registration($email, $fname, $lname, $pass);
						echo $this->user->msg;
						break;
					case 'hospital':
						// var_dump($ema);exit;
						$this->hospital->registration($name, $email, $fname, $lname, $pass);
						echo $this->user->msg;
						break;
				}
			}
		}

		return $this->gotoIndex();
	}

	public function confirm($email = null, $confCode = null)
	{
		if (!$email && !$confCode) {
			$this->helper->error(true);
		}

		if ($email ?? null && $confCode ?? null) {
			if ($this->user->emailActivation($email, $confCode)) {
				echo "Activated";
			} else
				echo $this->user->msg;
		} else {
			echo "Invalid Request";
		}
	}

	public function auth($value = '')
	{

		if (!isset($_POST['email'])) {
			$this->helper->error(true);
		}

		if (null !== $_POST['email'] && null !== $_POST['password']) {
			$email = $_POST['email'] ?? null;
			$password = $_POST['password'] ?? null;

			if ($email && $password) {
				if ($this->user->login($email, $password) === true) {
					header("LOCATION:/");
				} else {
					header("LOCATION:/users/login/" . $this->user->msg);
				}
			} else {
				header("LOCATION:/users/login/error_empty_field");
			}
		} else {

			header("LOCATION:/users/login/error_no_proper_data");
		}
		return;
	}

	public function register($value = '')
	{
		switch ($_POST['type']) {
			case 'customer':
				header("LOCATION:/ui/regi");
				break;
			case 'hospital':
				header("LOCATION:/ui/registerHospital");
				break;
			case 'doctor':
				header("LOCATION:/ui/registerDoctor");
				break;
			case 'patient':
				header("LOCATION:/ui/registerPatient");
				break;
		}
	}

	public function profile(int $id = null)
	{
		//print_r($_SESSION['user']);exit;
		if (!$id || !isset($_SESSION['user']['user_id']) || $_SESSION['user']['user_id'] != $id) {
			$this->helper->error(true);
		}
		$user = $this->user->getPersonalInfo($id);
		$user['orders'] = $this->user->getOrders($id);
		$user['notice'] = $this->user->getNotice($id);

		// need to upgrade this
		// get all product for all orders, now it is only storing one orders product
		foreach ($user['orders'] as $key => $order) {
			$user['products'][$key] = $this->user->getProductsByOrderToken($order['order_token']);
		}
		// print_r($user['products']);exit;


		if (isset($user['products'])) {

			foreach (@$user['products'] as $data) {
				foreach (@$data as $datum) {
					$product = new Product($datum->product_id);
					$datum->slug = $product->slug;
					$datum->price = $product->price;
					$datum->name = $product->name;
				}
			}
		}
		return $user;
	}

	public function updateProfile()
	{

		//print_r($_SESSION['user']);exit;
		if (!isset($_SESSION['user']['user_id'])) {
			$this->helper->error(true);
		}

		$data['id'] = $_SESSION['user']['user_id'];
		$data['fname'] = (string) $_POST['fname'] ?? '';
		$data['lname'] = (string) $_POST['lname'] ?? '';
		$data['email'] = (string) $_POST['email'] ?? '';
		$data['zip'] = (string) $_POST['zip'] ?? '';
		$data['phone'] = (string) $_POST['phone'] ?? '';
		$data['hospital'] = (string) $_POST['hospital'] ?? '';
		$data['address'] = (string) $_POST['address'] ?? '';
		$data['city'] = (string) $_POST['city'] ?? '';
		$data['state'] = (string) $_POST['state'] ?? '';
		$data['country'] = (string) $_POST['country'] ?? '';

		$this->user->updateProfile($data);
		
		return header("LOCATION:/ui/dashboard");
	}
}
