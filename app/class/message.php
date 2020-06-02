<?php



/**
 * 
 */
class Message extends Database
{
	
	private $first_name;
	private $last_name;
	private $email;
	private $phone;
	private $hospital_name;
	private $message;


	function __construct 
	(
		$first_name = null,
		$last_name = null,
		$email = null,
		$phone = null,
		$hospitalName = null,
		$message = null
						 )
	{
		$this->first_name = $first_name;
		$this->last_name = $last_name;
		$this->email = $email;
		$this->phone = $phone;
		$this->hospital_name = $hospitalName;
		$this->message = $message;
		$this->connect();
	}


	public function markAsRead(int $id)
	{
		$sql = "UPDATE contact SET new=0 WHERE id=".$id;
		$query = $this->conn->query($sql);
		if($query)
			return true;
		else
			return false;
	}

	public function getNewMessages()
	{
		$sql = "SELECT * FROM contact WHERE new=1";
		$query = $this->conn->query($sql);
		$data = array();
		while($result = $query->fetch_object()){
			array_push($data, $result);
		}
		 if($data)
		 	return $data;
	}


	public function save()
	{

		//print_r($this->conn);exit;
		$prepared = $this->conn->prepare("INSERT INTO `contact` (`first_name`, `last_name`, `email`, `phone`, `hospital_name`, `message`)

			VALUES(?,?,?,?,?,?)");

			$result = $prepared->bind_param("ssssss",
				$this->first_name,
				$this->last_name,
				$this->email,
				$this->phone,
				$this->hospital_name,
				$this->message
			);

			$done = $prepared->execute();

			if($done){
				$_SESSION['contact']['success'] = "Your message is submitted, we will contact soon";
			} else {
				$_SESSION['contact']['error'] =  "Sorry! your message is not submitted.";
			}

			header("Location:/ui/contact");

	}

}