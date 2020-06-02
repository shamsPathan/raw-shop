<?php

use Illuminate\Database\Capsule\Manager as DB;
include_once '../app/dbconfig.php';
require_once '../app/core/pdoDatabse.php';
require_once '../app/core/database.php';
require_once '../app/class/order.class.php';
require_once '../app/class/NoticeClass.php';
include_once '../app/class/user.class.php';
include_once '../app/class/Product.php';


class Database
{

	private $server			= "localhost";
	private $username 		= "root";
	private $password 		= "sz1";
	private $db 			= "medi";
	public $conn 			=  NULL;
	//	 private $queryResult   =  NULL ;

	function __construct(
		$server = null,
		$user   = null,
		$pass   = null,
		$db     = null
	) {
			$instance = ConnectDb::getInstance();
			$this->server   = $instance->host;
			$this->username = $instance->user;
			$this->password = $instance->pass;
			$this->db       = $instance->name;
			$this->order = new Order();
			$this->notice = new NoticeClass();
			$this->user = new User();
			$this->product = new Product();
	}

	function connect()
	{
		try {
			$instance = ConnectDb::getInstance();
			$this->conn = new mysqli($instance->host, $instance->user, $instance->pass, $instance->name);
			//debugecho
			//    	echo "Connected successfully"; 
		} catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
			exit;
		}
	}
	///temp functions
	public function slug($value = '')
	{
		$this->connect();
		$data = $this->conn->query("SELECT `id`,`name`,`slug` FROM products WHERE id > '3059' ORDER BY id DESC");
		while ($sub = $data->fetch_assoc()) {
			// make slug
			$string = strtolower($sub['name']);
			$string = preg_replace('/\s+/', '_', $string);
			$done = $this->conn->query("UPDATE products SET slug ='" . $string . "'  WHERE id=" . $sub['id'] . ";
");
		}

		return $done;
	}

	public function makeImageCol($value = '')
	{
		$this->connect();

		$table = ["dpt", "cat", "subcat"];
		foreach ($table as $key => $table) {

			$data = $this->conn->query("SELECT * FROM " . $table . " WHERE 1");

			while ($sub = $data->fetch_assoc()) {
				// make slug
				$imageText = $table . "/" . $sub['slug'] . ".jpg";
				$done = $this->conn->query("UPDATE " . $table . " SET image ='" . $imageText . "'  WHERE id=" . $sub['id'] . ";
				");
			}
			# code...
		}


		return $done;
	}

	public function makeImageFolders($value = '')
	{
		//make folders		
		$this->connect();
		$data = $this->conn->query("SELECT * FROM subcat WHERE 1");
		$error = 0;
		while ($sub = $data->fetch_assoc()) {
			$path = "./images/products/" . $sub['slug'];
			if (!file_exists($path)) {
				mkdir($path, 0777, true);
			}
		}
		return $error;
	}

	public function import_image($value = '')
	{
		$this->connect();

		$query = $this->conn->query("SELECT * FROM image WHERE 1");
		$data = $query->fetch_assoc();
		$image = imagecreatefromstring($data['pi1']);
		//ob_start(); //You could also just output the $image via header() and bypass this buffer capture.
		$path = "./images/hello/temp.jpg";
		// imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);


		$image = imagejpeg($image, $path, 100);
		// $data = ob_get_contents();
		// ob_end_clean();
		// var_dump($data);
		//fwrite($file, base64_decode($image));
	}
	///temp functions ends


	//Message Blocks


	public function FunctionName($value = '')
	{
		# code...
	}












	///////////////  MEDI   /////////////////

	function query($sql = '')
	{

		return $this->conn->query($sql);
	}

	////////////////////////////////////////

	function getFieldData($table, $fields = [], $id = NULL)
	{

		$dataArray = [];
		$fieldString = implode(",", $fields);

		$sql = "SELECT $fieldString FROM $table ";
		if ($id)
			$sql = "SELECT $fieldString FROM $table WHERE catId ='" . $id . "'";
		//		echo $sql; 
		$data = $this->db->query($sql);

		if ($data->rowCount()) {
			while ($r = $data->fetch(PDO::FETCH_NUM)) {	//echo "<br>"; print_r($r);
				array_push($dataArray, array($r[0] => $r[1]));
			}
		}
		return $dataArray;
	}
}
