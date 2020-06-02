<?php

require_once '../app/helper/helper.php';
require_once '../app/class/Product.php';

use Illuminate\Database\Capsule\Manager as DB;


class Admin extends Controller
{

	public $data = array();

	function __construct()
	{
		// parent::__construct();
		if (isset($_SESSION['user']['user_role']) && $_SESSION['user']['user_role'] == 'admin') {
			parent::__construct(); //with database

			$this->api = new Api;
		} else {
			$_SESSION['prevLocation'] =  "$_SERVER[REQUEST_URI]";
			echo '<meta http-equiv="refresh" content="0; URL=/users/login">';
			exit;
		}
	}

	public function login($value = '')
	{
		echo "Please login";
	}

	public function index()
	{

		$data = array();

		$this->view->load('dashboard/index', $data);
	}


	public function orders($type = null)
	{
		$data = array();

		switch ($type) {
			case 'new':
				$data['orders'] = $this->order->all('new');
				break;
			case 'shipping':
				$data['orders'] = $this->order->all('shipping');
				break;
			case 'delivered':
				$data['orders'] = $this->order->all('delivered');
				break;
			default:
				echo "None";
				break;
		}

		foreach ($data['orders'] as $key => $order) {
		
			$data['products'][$key] = $this->user->getProductsByOrderToken($order['order_token']);
		}
		// print_r($data['products']);exit;


		if (isset($data['products'])) {

			foreach (@$data['products'] as $datas) {
				foreach (@$datas as $datum) {
					$product = new Product($datum->product_id);
					$datum->slug = $product->slug;
					$datum->price = $product->price;
					$datum->name = $product->name;
				}
			}
		}
		$this->view->load('admin/orders', $data);
	}


	public function reports($new = null)
	{
		if ($new) {
			$data['reports']   = $this->report->allNew();
			$data['xrays']   = $this->report->getXrays();
			$this->view->load('admin/NewReports', $data);
		} else {
			$data['reports']   = $this->report->allDone();
			$data['xrays']     = $this->report->getXrays();
			$this->view->load('admin/reports', $data);
		}
	}

	public function appointments($type = null)
	{
		switch ($type) {
			case 'new':
				$data['doctors']   = $this->doctor->all();
				$data['hospitals'] = $this->hospital->all();
				$data['departments'] = $this->department->all();
				$data['appiontments'] = $this->appointments->allNew();
				$this->view->load('admin/newAppointment', $data);
				break;
			default:
				$data['doctors']   = $this->doctor->all();
				$data['hospitals'] = $this->hospital->all();
				$data['departments'] = $this->department->all();
				$data['appiontments'] = $this->appointments->all();
				$this->view->load('admin/appointments', $data);
				break;
		}
	}



	public function doctors($type = null)
	{
		switch ($type) {
			case 'new':
				echo "new";
				break;
			default:
				echo "None";
				break;
		}
	}


	public function hospitals($type = null)
	{
		switch ($type) {
			case 'new':
				echo "new";
				break;
			default:
				echo "None";
				break;
		}
	}


	public function message($id = null)
	{
		require_once('../app/class/message.php');
		$messages = new Message();

		if ($id != null) {
			$done = $messages->markAsRead((int) $id);
			header("Location:/admin/message");
			return;
		}

		$data = $messages->getNewMessages();
		$this->view->showMessages($data);
	}

	public function addProduct($msg = null)
	{

		if ($msg == "refresh") {
			echo '<meta http-equiv="refresh" content="0; URL=/admin/addProduct">';
		}

		$this->view->load('admin/addProduct');
	}

	public function makeProductActive($id = null)
	{

		if ((int) $id) {
			$product = new Product((int) $id);
			$product->active = 1;
			$product->save();
		}
		return header('location:/admin/productActiveList');
	}

	public function makeProductDeactive($id = null)
	{

		if ((int) $id) {
			$product = new Product((int) $id);
			$product->active = 0;
			$product->save();
		}

		return header('location:/admin/productDeactiveList');
	}


	public function productActiveList()
	{

		$data['products'] = $this->model->getAllActiveProducts();
		$this->view->load('product/active-list', $data);
	}

	public function productDeactiveList()
	{

		$data['products'] = $this->model->getAllDeactiveProducts();
		$this->view->load('product/deactive-list', $data);
	}

	public function saveProduct()
	{

		$data = [];

		$helper = new Helper;
		$this->data['name'] = addslashes($_POST['name']);
		$this->data['model'] = addslashes($_POST['model']);
		$this->data['slug'] = $helper->encodeText($this->data['name']) . "_" . $helper->encodeText($this->data['model']);
		$this->data['subcategory'] = addslashes($_POST['subcategory']);
		$this->data['stock'] = addslashes($_POST['stock']);
		$this->data['rating'] = addslashes($_POST['rating']);
		$this->data['psd'] = addslashes($_POST['psd']);
		$this->data['pfd'] = addslashes($_POST['pfd']);
		$this->data['pfs'] = addslashes($_POST['pfs']);
		$this->data['price'] = addslashes($_POST['price']);
		

		if ($_FILES['pi1']['tmp_name']) {
			$this->data['pi1'] = file_get_contents(addslashes($_FILES['pi1']['tmp_name'] ?? null));
		}
		if ($_FILES['pi2']['tmp_name']) {
			$this->data['pi2'] = file_get_contents(addslashes($_FILES['pi2']['tmp_name'] ?? null));
		}
		if ($_FILES['pi3']['tmp_name']) {
			$this->data['pi3'] = file_get_contents(addslashes($_FILES['pi3']['tmp_name'] ?? null));
		}
		if ($_FILES['pi4']['tmp_name']) {
			$this->data['pi4'] = file_get_contents(addslashes($_FILES['pi4']['tmp_name'] ?? null));
		}
		if ($_FILES['pi5']['tmp_name']) {
			$this->data['pi5'] = file_get_contents(addslashes($_FILES['pi5']['tmp_name'] ?? null));
		}
		if ($_FILES['pc']['tmp_name']) {
			$this->data['pc'] = file_get_contents(addslashes($_FILES['pc']['tmp_name'] ?? null));
		}
		if ($_FILES['pm']['tmp_name']) {
			$this->data['pm'] = file_get_contents(addslashes($_FILES['pm']['tmp_name'] ?? null));
		}
	

		$save = $this->model->insertProduct($this->data);
		
		$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		$domainName = $_SERVER['HTTP_HOST'] . '/';
		$path = $protocol . $domainName;
		$path = trim(preg_replace('/\s+/', ' ', $path));

		if ($save) {



			$_SESSION['success'] = "Inserted";

			$this->addProduct($ins = "refresh");
		} else {

			$_SESSION['error'] = "<br/> <h5>Please fill all fields</h5>";
			$this->addProduct($ins = "refresh");
		}
	}


	public function addHospital()
	{
		$data = array();
		return $this->view->load('hospital/add', $data);
	}

	public function storeHospital()
	{
		$data['name'] = $_POST['name'];
		$data['email'] = $_POST['email'];
		$data['phone'] = $_POST['phone'];
		$data['address'] = $_POST['address'];

		DB::insert(
			'insert into hospitals (name, email, phone, address) values (?, ?, ?, ?)',
			[
				$data['name'],
				$data['email'],
				$data['phone'],
				$data['address']
			]
		);

		$data = array();

		return $this->listHospital();
	}

	public function listHospital()
	{
		$data['hospitals'] = DB::select('select * from hospitals where 1');
		return $this->view->load('hospital/list', $data);
	}

	public function listDoctors()
	{
		$data['doctors'] = DB::select('select * from doctors where 1');
		if ($data['doctors']) {
			foreach ($data['doctors'] as &$doctor) {
				$hospital = DB::select('select * from hospitals where id =' . $doctor->hospital_id);
				$doctor->hospital = $hospital[0]->name;
			}
		}
		return $this->view->load('doctor/list', $data);
	}

	public function addDoctor()
	{
		$data['hospitals'] = DB::select('select * from hospitals where 1');
		return $this->view->load('doctor/add', $data);
	}

	public function storeDoctor()
	{
		$data['name'] = $_POST['name'];
		$data['email'] = $_POST['email'];
		$data['phone'] = $_POST['phone'];
		$data['address'] = $_POST['address'];
		$data['hospital'] = $_POST['hospital'];
		$data['qualification'] = $_POST['qualification'];

		DB::insert(
			'insert into doctors (name, email, phone, address, hospital_id, qualification) values (?, ?, ?, ?, ?, ?)',
			[
				$data['name'],
				$data['email'],
				$data['phone'],
				$data['address'],
				$data['hospital'],
				$data['qualification']
			]
		);

		$data = array();

		return $this->listDoctors();
	}
}
