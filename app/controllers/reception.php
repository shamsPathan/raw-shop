<?php

require_once '../app/helper/helper.php';
require_once '../app/class/Product.php';
require_once '../app/class/DoctorClass.php';
require_once '../app/class/AppointmentClass.php';


class Reception extends Controller {

	public $data = array();

	function __construct(){

		if(isset($_SESSION['user']['user_role'])){
		parent::__construct(); //with database

		// Objects
		$this->appointment = new AppointmentClass();
		
		$this->api = new Api;

		} else {
			$_SESSION['prevLocation'] =  "$_SERVER[REQUEST_URI]";
			echo '<meta http-equiv="refresh" content="0; URL=/users/login">';
			exit;
		}
		
	}


	public function makeAppointment()
	{

		$goBack = $_SESSION['redirect'];

		$data = $_POST;
		
		unset($_POST);

		if($this->appointment->make($data)){
			$_SESSION['success'] = "Appointment placed. Please wait for confirmation";
		}
		header('Location:'.$goBack) || die();
	}

	public function makeReport()
	{

		$goBack = $_SESSION['redirect'];

		$data = $_POST;
		
		unset($_POST);

		if($this->report->make($data)){
			$_SESSION['success'] = "Report sent. Please wait for confirmation";
		}
		header('Location:'.$goBack) || die();
	}

	public function updateAppointment()
	{
		$goBack = $_SESSION['redirect'];
		$data = $_POST;
		
		unset($_POST);

		if($this->appointment->update($data)){
			$_SESSION['success'] = "Appointment Updated";
		}

		header('Location:'.$goBack) || die();
	}

	public function declineAppointment()
	{
		$goBack = $_SESSION['redirect'];
		$data = $_POST;
		
		unset($_POST);
		
		if($this->appointment->update($data, $reject = true)){
			$_SESSION['success'] = "Appointment Updated";
		}

		header('Location:'.$goBack) || die();
	}

}



?>
