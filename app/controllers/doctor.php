<?php

require_once '../app/helper/helper.php';
require_once '../app/class/Product.php';
require_once '../app/class/DoctorClass.php';
require_once '../app/class/HospitalClass.php';
require_once '../app/class/HospitalDepartmentClass.php';
require_once '../app/class/AppointmentClass.php';
use Illuminate\Database\Capsule\Manager as DB;


class Doctor extends Controller {

	public $data = array();

	function __construct(){

		if(isset($_SESSION['user']['user_role']) && $_SESSION['user']['user_role']=='doctor'){
		parent::__construct(); //with database
		

			$this->doctor     = new DoctorClass();
			$this->hospital   = new HospitalClass();
			$this->department = new HospitalDepartmentClass(); 
			$this->appointments = new AppointmentClass(); 
		$this->api = new Api;

		} else {
			$_SESSION['prevLocation'] =  "$_SERVER[REQUEST_URI]";
			echo '<meta http-equiv="refresh" content="0; URL=/users/login">';
			exit;
		}
		
	}



	public function index() {

		$data = array();
		$this->view->load('dashboard/doctor', $data);
	}

	public function appointments($edit = null)
	{

		if($edit){
			$data['hospitals'] = $this->hospital->all();
			$data['departments'] = $this->department->all();
			$doctorID = $_SESSION['user']['id'];
			$data['appointment'] = $this->appointments->get($edit);
			
			$this->view->load('doctor/newAppointment', $data);
		} else {
			$doctorID = $_SESSION['user']['id'];
			$data['appointments'] = $this->appointments->allByDoctor($doctorID);
			$this->view->load('doctor/appointments', $data);
		}
		
	}

	public function updateProfile()
	{

		//print_r($_SESSION['user']);exit;
		if(!isset($_SESSION['user']['user_id'])){
			$this->helper->error(true);
		}
		
		$data['id'] = $_SESSION['user']['user_id'];
		$data['name'] = (string)$_POST['name']??'';
		$data['email'] = (string)$_POST['email']??'';
		$data['phone'] = (string)$_POST['phone']??'';
		$data['chamber'] = (string)$_POST['chamber']??'';
		$data['address'] = (string)$_POST['address']??'';
		
		$this->doctor->updateProfile($data);
		
		return header("LOCATION:/doctor/general");
	}

	public function general($edit = null)
	{
		$data = $this->doctor->general();
	
		if($edit){
			$this->view->load('doctor/generalEdit', $data);	
		} else {
			$this->view->load('doctor/general', $data);
		}
		
	}

	public function reports($new = null)
	{
		if($new){
			$data['reports']   = $this->report->allNew('doctor');
			$data['xrays']   = $this->report->getXrays();
			$this->view->load('doctor/newReport', $data);
		} else {
			$data['reports']   = $this->report->allDone('doctor');
			$data['xrays']   = $this->report->getXrays();
			$this->view->load('doctor/reports', $data);
		}
		
	}

	public function medicines($buy = null)
	{
		if($buy){
			$this->view->load('doctor/buyMedicine');
		} else {
			$this->view->load('doctor/medicines');
		}
		
	}

	public function profile($edit = null)
	{
		if($edit){
			$this->view->load('doctor/editProfile');
		} else {
			$this->view->load('doctor/profile');
		}
		
	}

}



?>
