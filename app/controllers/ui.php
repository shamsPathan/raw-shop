<?php

use Dompdf\Adapter\CPDF;
use Dompdf\Dompdf;
use Dompdf\Exception;
use Hybridauth\Hybridauth;
use Hybridauth\HttpClient;

require_once '../app/class/dompdf/autoload.inc.php';
include_once '../app/class/review.php';
include_once("../app/controllers/myCart.php");
include_once("../app/controllers/users.php");
include_once '../app/class/user.class.php';

class Ui extends Controller
{
	// store data from database
	public $data = [];
	//product object with database connection
	private $product;
	public $web = [];
	private $valid = false;


	function __construct()
	{
		parent::__construct();
		$this->users = new Users();
		$this->product = new Product();
		//clean POST data
		if (!empty($_POST)) {
			$_POST = $this->helper->sanitizeArray($_POST);
		}
		if (!empty($_GET)) {
			$_GET = $this->helper->sanitizeArray($_GET);
		}
		// data cache {Dpt cat and subcat}
	}

	public function index()
	{
		$this->home();
	}

	public function fun($var = null)
	{
		var_dump($var);exit;
	}

	public function logi(string $provider = null)
	{
		if(!isset($_SESSION['provider'])){
			$_SESSION['provider'] = $provider;
		}
		

		if(!$provider){
			return header("Location:/users/login");
		}

		// if(isset($_GET['code'])){
		// 	var_dump($_GET['code']);exit;
		// }

		$config = [
		
			// 'callback' => 'http://127.0.0.1:8888/ui/logi',
			// https://medicalshopbd.com/
			//https://medi.supathan.me
			'callback' => 'https://medi.supathan.me/ui/logi/'.$_SESSION['provider'],
			
			'providers' => [
				'gitHub' => [
					'enabled' => true,
					'keys'    => ['id' => '', 'secret' => ''],
				],

				'google' => [
					'enabled' => true,
					'keys'    => ['id' => '499338501986-iug99lfdv3ig78tl34ctmd96i87gj1md.apps.googleusercontent.com', 'secret' => 'rn9LFmopRed00-StAoqRYy9a'],
				],

				'facebook' => [
					'enabled' => true,
					'keys'    => ['id' => '762755554131005', 'secret' => 'a632e65f968bc9e685efdbdb6b58542e'],
				],

				'twitter' => [
					'enabled' => true,
					'keys'    => ['key' => '', 'secret' => ''],
				]
			],
		];
		
		try {

			$hybridauth = new Hybridauth($config);

			$adapter = $hybridauth->authenticate($_SESSION['provider']);

			// $adapter = $hybridauth->authenticate( 'Google' );
			// $adapter = $hybridauth->authenticate( 'Facebook' );
			// $adapter = $hybridauth->authenticate( 'Twitter' );

			$tokens = $adapter->getAccessToken();
			$userProfile = $adapter->getUserProfile();

			if($userProfile){
				
				$fname = $userProfile->firstName??null;
				$lname = $userProfile->lastName??null;
				$email = $userProfile->email;
				$provider = $provider;
				$provider_id = $userProfile->identifier;

				// save user to database
				$user = new User();
				$user->regiFacebook($email, $fname, $lname, $provider_id);
		}


			// print_r( $tokens );
			// print_r( $userProfile );

			$adapter->disconnect();

		} catch (\Exception $e) {
			echo $e->getMessage();
		}
		header("Location:/");
		unset($_SESSION['provider']);
	}

	public function auth()
	{
		echo "login";
		exit;
	}

	public function hello($value = '')
	{
		$this->view->hello();
	}

	public function home()
	{
		$this->view->home($this->data, $this->model);
	}

	public function catagory(String $catSlug = null, String $subcat = null)
	{

		if ($catSlug && !$subcat) {
			$this->data['cat'] = $this->model->getIdBySlug($catSlug, "cat");
			if ($this->data['cat']) {
				$this->data['sub'] = $_SESSION['website']['sub'][$this->data['cat']->id];
				$this->view->catagoryDefault($this->data, $this->model);
				return;
			} else {
				$this->helper->error(true);
			}
		}
		$this->data['catSlug'] = $catSlug;
		$this->data['subcatSlug'] = $subcat;
		$this->data['subData'] = $this->model->getSub($catSlug);
		$this->view->catagory($this->data, $this->model);
	}

	public function subcatagory(int $id)
	{

		$this->data = $this->model->getSub($id);
		$this->view->subcatagory($this->data, $this->model);
	}

	public function departments(String $slug)
	{

		foreach ($_SESSION['website']['dpt'] as $key => $dpt) {
			if ($dpt->slug == $slug) {
				$this->data['cat'] = $_SESSION['website']['cat'][$dpt->id];
				$this->data['dpt'] = $dpt;
				$this->error = false; // for good routing
				break;
			}
		}
		$this->helper->error($this->error);
		$this->view->department($this->data, $this->model);
	}

	public function error()
	{
		$this->view->error();
	}


	public function logreg()
	{
		$this->data = null;
		$this->view->logreg($this->data);
	}

	public function regi()
	{
		$this->data['menue'] = $this->model->getDpt();
		$this->view->showRegisterPage($this->data, $this->model);		

	}

	public function registerDoctor()
	{
		$this->data['menue'] = $this->model->getDpt();
		$this->view->showDoctorRegisterPage($this->data, $this->model);
	}

	public function registration()
	{
		$this->data['menue'] = $this->model->getDpt();
		$this->view->registration($this->data, $this->model);
	}

	public function registerPatient()
	{
		$this->data['menue'] = $this->model->getDpt();
		$this->view->showPatientRegisterPage($this->data, $this->model);
	}

	public function registerHospital()
	{
		$this->data['menue'] = $this->model->getDpt();
		$this->view->showHospitalRegisterPage($this->data, $this->model);
}



	// Electro Medical Training
	public function emt()
	{
		$this->view->emt();
	}


	public function appointment()
	{
		$this->view->appointment();
	}

	public function return()
	{
		$this->view->return();
	}

	public function et()
	{
		$this->view->et();
	}

	public function sitemap()
	{
		$this->view->sitemap();
	}

	public function studentform()
	{
		$this->view->studentform();
	}

	public function biomedicalequipmentlearning()
	{
		$this->view->biomedicalequipmentlearning();
	}

	public function ct()
	{
		$this->view->ct();
	}
	public function mtt()
	{
		$this->view->mtt();
	}
	public function psm()
	{
		$this->view->psm();
	}
	public function health()
	{
		$this->view->health();
	}

	public function dashboard()
	{

		$userId = null;

		if (isset($_SESSION['user']['user_id'])) {
			$userId = $_SESSION['user']['user_id'];
		}

		switch ($_SESSION['user']['user_role']) {
			case 'user':
				$data = $this->users->profile($userId);
				$this->view->user($data);
				break;
			case 'admin':
				header("Location:/admin");
				break;
			case 'doctor':
				header("Location:/doctor");
				break;
			case 'hospital':
				header("Location:/hospital");
				break;
			case 'patient':
				header("Location:/patient");
				break;
			default:
				header("Location:/ui/error");
		}
		return 0;
	}

	public function dashboardEdit()
	{

		$userId = null;

		if (isset($_SESSION['user']['user_id'])) {
			$userId = $_SESSION['user']['user_id'];
		}

		switch ($_SESSION['user']['user_role']) {
			case 'user':
				$data = $this->users->profile($userId);
				$this->view->user($data, true);
				break;
			case 'admin':
				header("Location:/admin");
				break;
			case 'doctor':
				header("Location:/doctor");
				break;
			case 'hospital':
				header("Location:/hospital");
				break;
			case 'patient':
				header("Location:/patient");
				break;
			default:
				header("Location:/ui/error");
		}
		return 0;
	}

	public function finalorder()
	{
		$cart = new MyCart();
		
		include_once("../app/views/pages/finalorder.php");
		
		return true;

	}

	public function orderemail()
	{
		//print_r($_SESSION['cart'][0]);exit;
		$helper = new Helper;
		foreach ($_POST as $key => $value) {
			if (empty($value)) {
				$_SESSION['order']['error'] = $key . " is empty! PLease fill all fields";
				header("Location:/ui/finalorder");
				return;
			}
			$_POST[$key] = $helper->sanitizeString($value);
		}

		require '../app/class/order.class.php';

		$token = rand();
		$order = new Order();
		$do = $order->save($token, $_POST);

		if ($do) {

			$dompdf = new Dompdf();
			ob_get_clean();
			ob_start();
			require '../app/views/pages/orderPdf.php';
			$html = ob_get_clean();
			//print_r($html);exit;

			$dompdf->loadHtml($html);
			$dompdf->setPaper('A4', 'portrait');
			$dompdf->render();
			//var_dump($dompdf->output());exit;
			$pdfName = "InvoiceMSB" . $token;
			$dompdf->stream($pdfName, array("Attachment" => false));
		} else echo "order not saved";
		//unset($_SESSION['cart']);
	}
	public function partners()
	{
		$this->view->partners();
	}

	public function service()
	{
		$this->view->service();
	}

	public function ourteam()
	{
		$this->view->ourteam();
	}

	public function jobsearch()
	{
		$this->view->jobsearch();
	}

	public function about()
	{
		$this->view->about();
	}

	public function contact()
	{
		$this->data = $this->model->servicesData();
		$this->view->contact($this->data);
	}

	public function help()
	{

		$this->data = $this->model->servicesData();
		$this->view->help($this->data);
	}

	public function cart()
	{
		//$this->data = $this->model->servicesData();
		$this->view->cart();
	}

	public function productlist()
	{
		$this->view->productlist();
	}

	public function product(String $slug = null)
	{
		if ($slug) {
			$review = new Review;
			$reviews = $review->get($slug);
			$got  = $this->product->loadBySlug($slug);
			if (!$got) {
				$this->helper->error(true);
			}
			$this->view->showProduct($this->product, $reviews);
		}
	}

	public function sendMessage()
	{
		require_once '../app/class/message.php';
		$helper = new Helper;
		foreach ($_POST as $key => $value) {
			if (empty($value)) {
				$_SESSION['contact']['error'] = $key . " is empty! PLease fill all fields";
				header("Location:/ui/contact");
				return;
			}
			$_POST[$key] = $helper->sanitizeString($value);
		}
		$message = new Message(
			$_POST['first_name'],
			$_POST['last_name'],
			$_POST['email'],
			$_POST['phone'],
			$_POST['hospital_name'],
			$_POST['message']
		);
		$message->save();
	}
}
