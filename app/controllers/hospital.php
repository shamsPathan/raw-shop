<?php

require_once '../app/helper/helper.php';
require_once '../app/class/Product.php';

use Illuminate\Database\Capsule\Manager as DB;


class Hospital extends Controller {

	public $data = array();

	function __construct(){

		if(isset($_SESSION['user']['user_role']) && $_SESSION['user']['user_role']=='hospital'){
		parent::__construct(); //with database
		
		} else {
			$_SESSION['prevLocation'] =  "$_SERVER[REQUEST_URI]";
			echo '<meta http-equiv="refresh" content="0; URL=/users/login">';
			exit;
		}
		
	}

	public function login($value='')
	{
		echo "Please login";
	}

	public function index() {

		$data = array();
		
		$this->view->load('dashboard/hospital', $data);
	}

	public function appointments($new = null)
	{
		if($new){
			$this->view->load('hospital/newAppointment');
		} else {
			$this->view->load('hospital/appointments');
		}
		
	}

	public function reports($new = null)
	{
		if($new){
			$data['doctors']   = $this->doctor->all();
			$data['xrays']   = $this->report->getXrays();
			$this->view->load('hospital/newReport', $data);
		} else {
			$data['reports']   = $this->report->all('hospital');
			$data['xrays']   = $this->report->getXrays();
			$this->view->load('hospital/reports', $data);
		}	
	}

	public function general($edit = null)
	{
		$data = $this->hospital->general();
	
		// print_r($data);exit;
		if($edit){
			$this->view->load('hospital/generalEdit', $data);	
		} else {
			$this->view->load('hospital/general', $data);
		}
		
	}

	public function updateProfile()
	{

		//print_r($_SESSION['user']);exit;
		if(!isset($_SESSION['user']['user_id'])){
			$this->helper->error(true);
		}
		
		$data['id'] = $_SESSION['user']['user_id'];
		$data['author'] = (string)$_POST['author']??'';
		$data['email'] = (string)$_POST['email']??'';
		$data['phone'] = (string)$_POST['phone']??'';
		$data['name'] = (string)$_POST['name']??'';
		$data['job_title'] = (string)$_POST['job_title']??'';
		$data['gender'] = (string)$_POST['gender']??'';
		$data['address'] = (string)$_POST['address']??'';
		
		$this->hospital->updateProfile($data);
		
		return header("LOCATION:/hospital/general");
	}
	public function medicines($buy = null)
	{
		if($buy){
			$this->view->load('hospital/buyMedicine');
		} else {
			$this->view->load('hospital/medicines');
		}
	}

	public function profile($edit = null)
	{
		if($edit){
			$this->view->load('hospital/editProfile');
		} else {
			$this->view->load('hospital/profile');
		}
		
	}


}



?>
