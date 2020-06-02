<?php

require_once '../app/helper/helper.php';
require_once '../app/class/Product.php';

use Illuminate\Database\Capsule\Manager as DB;


class Customer extends Controller {

	public $data = array();

	function __construct(){

		if(isset($_SESSION['user']['user_role']) && $_SESSION['user']['user_role']=='customer'){
		parent::__construct(); //with database
		
		$this->api = new Api;

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
		
		$this->view->load('dashboard/index', $data);
	}

	public function message($id = null) {
		require_once('../app/class/message.php');
		$messages = new Message();

		if($id!=null){
			$done = $messages->markAsRead((int)$id);
			header("Location:/admin/message");
			return;
		}

		$data = $messages->getNewMessages();		
		$this->view->showMessages($data);
	}

	public function addProduct($msg=null) {
        
        if($msg=="refresh"){
            echo '<meta http-equiv="refresh" content="0; URL=/admin/addProduct">';

        }
		
		$this->view->addProduct();
	}	

	public function makeProductActive($id=null) {
        
        if((int)$id){
			$product = new Product((int)$id);
			$product->active = 1;
			$product->save();
		}
		return header('location:/admin/productActiveList');
	}

	public function makeProductDeactive( $id = null) {

        if((int)$id){
			$product = new Product((int)$id);
			$product->active = 0;
			$product->save();
		}

		return header('location:/admin/productDeactiveList');
	}	
	


	public function addHospital()
	{
		$data = array();
		return $this->view->load('hospital/add' , $data);
	}

	public function storeHospital()
	{
		$data['name'] = $_POST['name'];
		$data['email'] = $_POST['email'];
		$data['phone'] = $_POST['phone'];
		$data['address'] = $_POST['address'];

		DB::insert('insert into hospitals (name, email, phone, address) values (?, ?, ?, ?)',
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
		return $this->view->load('hospital/list' , $data);
	}

	public function listDoctors()
	{
		$data['doctors'] = DB::select('select * from doctors where 1');
		if($data['doctors']){
			foreach($data['doctors'] as &$doctor){
				$hospital = DB::select('select * from hospitals where id ='.$doctor->hospital_id);
				$doctor->hospital = $hospital[0]->name;
			}
		}
		return $this->view->load('doctor/list' , $data);
	}

	public function addDoctor()
	{
		$data['hospitals'] = DB::select('select * from hospitals where 1');
		return $this->view->load('doctor/add' , $data);
	}

	public function storeDoctor()
	{
		$data['name'] = $_POST['name'];
		$data['email'] = $_POST['email'];
		$data['phone'] = $_POST['phone'];
		$data['address'] = $_POST['address'];
		$data['hospital'] = $_POST['hospital'];
		$data['qualification'] = $_POST['qualification'];

		DB::insert('insert into doctors (name, email, phone, address, hospital_id, qualification) values (?, ?, ?, ?, ?, ?)',
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



?>
