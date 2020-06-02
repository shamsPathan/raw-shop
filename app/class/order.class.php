<?php

class Order extends Database {
	private $db;

	public function __construct()
	{
		$this->connect();
	}


	public function allNew($id, $type=null)
	{
		$user_type = 'hospital';

		if($type){
			$user_type = $type;
		}

		$sql = "SELECT * FROM `order` WHERE user_id = ? AND user_type = '".$user_type."'";
			
			$prepared = $this->conn->prepare($sql);
			$result = $prepared->bind_param("i",
				$id
			);
			$done = $prepared->execute();
			$result = $prepared->get_result();
			$data = array();
			while($row = $result->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
	}

	public function all($type = null)
	{
		$sql = "SELECT * FROM `order`  WHERE status = ?";
			
			$prepared = $this->conn->prepare($sql);
			$result = $prepared->bind_param("s",
				$type
			);
			$done = $prepared->execute();
			$result = $prepared->get_result();
			$data = array();
			while($row = $result->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
	}

	public function save(String $token, Array $customer)
	{
		//print_r($customer);
		//print_r($this->conn);
		$customerId =  null;

		if($_SESSION['user']){
			//if user logged in
			$done = true;
			$customerId =  $_SESSION['user']['user_id'];
		} else {
			// If user not logged in
			$sql = "INSERT INTO `persons` (`first_name`,`last_name`, `country`, `state`, `city`, `hospital`, `address`, `zip`, `phone`, `personal_email`) 
			VALUES(?,?,?,?,?,?,?,?,?,?)";
			$prepared = $this->conn->prepare($sql);

			$result = $prepared->bind_param("ssssssssss",
					$customer['first_name'],
					$customer['last_name'],
					$customer['country'],
					$customer['division'],
					$customer['city'],
					$customer['hospital'],
					$customer['address'],
					$customer['zip_code'],
					$customer['phone_number'],
					$customer['email_address']
				);
			$done = $prepared->execute();
			$customerId =  $this->conn->insert_id;
		}


		if($done) {
			
			$this->connect();
			$sql = "INSERT INTO `order` (`order_token`,`user_id`) 
			VALUES(?,?)";
			
			$prepared = $this->conn->prepare($sql);
			$result = $prepared->bind_param("ss",
				$token,
				$customerId
			);
			$done = $prepared->execute();

			if($done){
				echo "order saved";
				require_once("../app/controllers/myCart.php");
				$cart = new MyCart();
				if($cart->saveOrder($token)){
					return true;					
				} else{
					return false;
				}

			} else {
				return false;
			}
		}
		else {

			return false;
		}
	}


}	