<?php
require_once('../app/core/database.php');

/**
 * 
 */
class World
{
	
	private $db;

	function __construct()
	{
		$db = new Database();
		$db->connect();
		$this->db = $db->conn;
	}

	public function getCountry($value='')
	{
		$sql = "SELECT * FROM `countries` WHERE 1";

		$query = $this->db->query($sql);
		$countries = array();
		while($result = $query->fetch_object()){
			array_push($countries, $result);
		}

		return $countries;
	}

	public function getStates(int $countryId = null)
	{
		$sql = "SELECT * FROM `states` WHERE `country_id`=".$countryId;
		//echo $sql;exit;
		$query = $this->db->query($sql);
		$states = array();
		while($result = $query->fetch_object()){
			array_push($states, $result);
		}

		return $states;
	}

	public function getCities(int $stateId = null)
	{
		$sql = "SELECT * FROM `cities` WHERE `state_id`=".$stateId;
		//echo $sql;exit;
		$query = $this->db->query($sql);
		$cities = array();
		while($result = $query->fetch_object()){
			array_push($cities, $result);
		}

		return $cities;
	}

}



