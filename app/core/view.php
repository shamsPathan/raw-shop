<?php

class View
{

	public $header;
	public $footer;
	public $viewPath;
	public $backendView;

	function __construct()
	{
		$this->viewPath = "/";
		$this->backendView = "../app/views/pages/backend/";
	}

	// Electro Medical Training

	public function emt()
	{
		include_once '../app/views/pages/emt.php';
	}

	public function sitemap()
	{
		include_once '../app/views/pages/sitemap.php';
	}


	public function studentform()
	{
		include_once '../app/views/pages/studentform.php';
	}

	public function biomedicalequipmentlearning()
	{
		include_once '../app/views/pages/bmelearning.php';
	}



	public function appointment()
	{
		include_once '../app/views/pages/appointment.php';
	}

	public function hello()
	{
		include_once '../app/views/pages/404.php';
	}

	public function return()
	{
		include_once '../app/views/pages/return.php';
	}


	public function logi()
	{
		$config = [
			'callback' => 'http://medi.local/ui/auth',
			'keys' => ['key' => '762755554131005', 'secret' => 'a632e65f968bc9e685efdbdb6b58542e']
		];

		try {
			$twitter = new Hybridauth\Provider\Twitter($config);

			$twitter->authenticate();

			$accessToken = $twitter->getAccessToken();
			$userProfile = $twitter->getUserProfile();
			$apiResponse = $twitter->apiRequest('statuses/home_timeline.json');
		} catch (\Exception $e) {
			echo 'Oops, we ran into an issue! ' . $e->getMessage();
		}
	}

	public function et()
	{
		include_once '../app/views/pages/404.php';
	}
	public function ct()
	{
		include_once '../app/views/pages/404.php';
	}

	public function mtt()
	{
		include_once '../app/views/pages/404.php';
	}
	public function health()
	{
		include_once '../app/views/pages/health.php';
	}

	public function psm()
	{
		include_once '../app/views/pages/psm.php';
	}
	public function finalorder($cart)
	{
		include_once '../app/views/pages/<link rel="stylesheet" href="<?=PATH?>css/orderemail.css">.php';
	}
	public function orderemail()
	{
		include_once '../app/views/pages/orderPdf.php';
	}
	public function user($data, $edit = false)
	{
		if ($edit) {
			include_once '../app/views/pages/userDashboardEdit.php';
			return;
		}
		include_once '../app/views/pages/user.php';
	}




	public function showLoginPage($value = '', $model)
	{
		$department = $model->getDpt();
		include '../app/views/partial/header.php';
		include '../app/views/pages/logreg.php';
		include '../app/views/partial/footer.php';
	}

	public function showRegisterPage($value = '', $model)
	{
		$department = $model->getDpt();
		include '../app/views/partial/header.php';
		include '../app/views/pages/reg.php';
		include '../app/views/partial/footer.php';
	}

	public function registration($value = '', $model)
	{
		$department = $model->getDpt();
		include '../app/views/partial/header.php';
		include '../app/views/pages/registration.php';
		include '../app/views/partial/footer.php';
	}

	public function showDoctorRegisterPage($value = '', $model)
	{
		$department = $model->getDpt();
		include '../app/views/partial/header.php';
		include '../app/views/pages/regDoctor.php';
		include '../app/views/partial/footer.php';
	}

	public function showHospitalRegisterPage($value = '', $model)
	{
		$department = $model->getDpt();
		include '../app/views/partial/header.php';
		include '../app/views/pages/regHospital.php';
		include '../app/views/partial/footer.php';
	}
	public function showPatientRegisterPage($value = '', $model)
	{
		$department = $model->getDpt();
		include '../app/views/partial/header.php';
		include '../app/views/pages/regPatient.php';
		include '../app/views/partial/footer.php';
	}

	public function home($data = null, $model)
	{
		//print_r($data);exit;
		$department = $_SESSION['website']['dpt'];

		include_once '../app/views/pages/home.php';
	}

	public function partners()
	{
		include_once '../app/views/pages/partner.php';
	}


	public function service()
	{
		include_once '../app/views/pages/service.php';
	}


	public function ourteam()
	{
		include_once '../app/views/pages/ourteam.php';
	}

	public function jobsearch()
	{
		include_once '../app/views/pages/hiring.php';
	}

	// public function partners(){
	// 	include_once '../app/views/pages/404.php';
	// }



	public function cart()
	{

		include_once '../app/views/pages/cart.php';
	}

	public function logreg($data = null)
	{
		include_once '../app/views/pages/logreg.php';
	}

	public function catagory($data = null, $model)
	{

		$data['cat'] = $model->getCatName($data['catSlug']) ?? "No Name";
		include_once '../app/views/pages/catagory.php';
	}

	public function catagoryDefault($data = null, $model)
	{

		include_once '../app/views/pages/catagoryDefault.php';
	}

	public function subcatagory($data = null, $model)
	{
		//print_r($data);exit;
		$department = $model->getDpt();
		include_once '../app/views/pages/catagory.php';
	}

	public function department($data = null, $model)
	{

		include_once '../app/views/pages/department.php';
	}

	public function showDashboard()
	{
		include_once '../app/views/pages/backend/index.php';
	}

	public function error()
	{
		include_once '../app/views/pages/error/404.php';
	}


	// Admin Section 

	public function showMessages($data = null)
	{
		include_once '../app/views/pages/backend/messages.php';
	}

	public function productlist()
	{
		include '../app/views/pages/backend/productlist.php';
	}



	public function about($data = null)
	{
		//$department = $model->getDpt();
		include '../app/views/pages/about.php';
	}

	public function login($data = null)
	{

		include '../app/views/pages/login.php';
	}

	public function register($data = null)
	{

		include '../app/views/pages/login.php';
	}

	public function contact($data = null)
	{

		include_once '../app/views/pages/contact.php';
	}

	public function help($data = null)
	{

		include '../app/views/pages/header.php';
		include '../app/views/pages/dashboard.php';
		include '../app/views/pages/footer.php';
	}

	public function addProduct($data = null)
	{

		include '../app/views/pages/backend/addProduct.php';
	}

	public function showProduct($product = '', $reviews = null)
	{
		//print_r($product);
		include '../app/views/pages/singleProduct.php';
	}

	public function load(string $view, $data = null)
	{
		// extracting variable from data array
		if ($data) {
			foreach ($data as $key => $datum) {
				${$key} = $datum;
			}
		}

		$view = $this->backendView . $view . ".php";

		if (file_exists($view)) {
			$path = $this->backendView;
			include $view;
		} else {
			echo "View page not found";
		}
		exit;
	}
}
