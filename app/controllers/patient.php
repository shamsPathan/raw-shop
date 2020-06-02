<?php


use Illuminate\Database\Capsule\Manager as DB;


class Patient extends Controller {

	public $data = array();

	function __construct(){

		if(isset($_SESSION['user']['user_role']) && $_SESSION['user']['user_role']=='patient'){
		
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

		$this->view->load('dashboard/patient', $data);
	}

	public function appointments($new = null)
	{

		$data['doctors']   = $this->doctor->all();
		$data['hospitals'] = $this->hospital->all();
		$data['departments'] = $this->department->all();

		if($new){
			$id = $_SESSION['user']['id'];
			$data['appiontments'] = $this->appointments->allByPatient($id);
			$this->view->load('patient/newAppointment', $data);
		} else {
			$this->view->load('patient/appointments', $data);
		}
		
	}

	public function reports($new = null)
	{
		if($new){
			$this->view->load('patient/newReport');
		} else {
			$this->view->load('patient/reports');
		}
		
	}

	public function general($edit = null)
	{
		$data = $this->patient->general();

		if($edit){
			$this->view->load('patient/generalEdit', $data);	
		} else {
			$this->view->load('patient/general', $data);
		}
		
	}

	public function updateProfile()
	{

		//print_r($_SESSION['user']);exit;
		if(!isset($_SESSION['user']['user_id'])){
			$this->helper->error(true);
		}
		
		$data['id'] = $_SESSION['user']['user_id'];
		$data['fname'] = (string)$_POST['fname']??'';
		$data['lname'] = (string)$_POST['lname']??'';
		$data['email'] = (string)$_POST['email']??'';
		$data['zip'] = (string)$_POST['zip']??'';
		$data['phone'] = (string)$_POST['phone']??'';
		$data['hospital'] = (string)$_POST['hospital']??'';
		$data['address'] = (string)$_POST['address']??'';
		$data['city'] = (string)$_POST['city']??'';
		$data['state'] = (string)$_POST['state']??'';
		$data['country'] = (string)$_POST['country']??'';

		$this->patient->updateProfile($data, 'patient');
		
		return header("LOCATION:/patient/general");
	}

	public function medicines($buy = null)
	{
		if($buy){
			$this->view->load('patient/buyMedicine');
		} else {
			$this->view->load('patient/medicines');
		}
		
	}

	public function profile($edit = null)
	{
		if($edit){
			$this->view->load('patient/editProfile');
		} else {
			$this->view->load('patient/profile');
		}
		
	}

}



?>
