<?php

/**
* 
*/

require_once('../app/core/model.php');
require_once('../app/core/view.php');
require_once('../app/controllers/api.php');
require_once '../app/helper/helper.php';
require_once '../app/class/Product.php';
require_once '../app/class/DoctorClass.php';
require_once '../app/class/PatientClass.php';
require_once '../app/class/HospitalClass.php';
require_once '../app/class/HospitalDepartmentClass.php';
require_once '../app/class/AppointmentClass.php';
require_once '../app/class/ReportClass.php';
require_once '../app/class/order.class.php';
require_once '../app/class/user.class.php';
require_once '../app/class/Product.php';

class Controller
{
	public $model;
	public $view;
	
	function __construct()
	{	
		$this->model = new Model;
		$this->view = new View;
		$this->getMenues();
		$this->helper = new Helper();
		$this->doctor     = new DoctorClass();
		$this->hospital   = new HospitalClass();
		$this->department = new HospitalDepartmentClass(); 
		$this->appointments = new AppointmentClass(); 
		$this->patient = new PatientClass(); 
		$this->report = new ReportClass(); 
		$this->order = new Order(); 
		$this->user = new User(); 
		// $this->api = new Api;

		//clean get and post



	}

	private function getMenues(){
//print_r($this->model->getDpt());exit;

		// var_dump($this->model->getDpt());die();
	if($_SESSION['website']['dpt']??null
			&& $_SESSION['website']['cat']??null
			 && $_SESSION['website']['sub']??null){
			return true;
			 //Menues are there
		} else {

		$this->web['dpt'] = $this->model->getDpt();
		// print_r($this->web['dpt'][0]->image);exit;
		$_SESSION['website']['dpt'] = $this->web['dpt'];
		$cats = [];
		foreach($this->web['dpt'] as $index=>$dpt){
			
			$cats[$dpt->id] = $this->model->getCat($dpt->id);
			
		}
		$_SESSION['website']['cat'] = $cats;
		unset($cats);


		$sub = [];
		foreach($_SESSION['website']['cat'] as $cat){

			foreach($cat as $index=>$cat){
			$sub[$cat->id] = $this->model->getSub($cat->id);
			}
		}

		$_SESSION['website']['sub'] = $sub;
		unset($sub);
	}

	}

}
