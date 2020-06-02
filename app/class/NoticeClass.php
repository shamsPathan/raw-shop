<?php

class NoticeClass extends Database {


	private $db;

	public function __construct()
	{
		$this->connect();
	}


	public function allNew($id, $type = null)
	{
		$user_type = 'hospital';
		if($type){
			$user_type = $type;
		}
		$sql = "SELECT * FROM `notice` WHERE user_id = ? AND user_type = '".$user_type."'";
			
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
}	