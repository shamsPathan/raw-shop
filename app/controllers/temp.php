<?php
include_once('../app/core/database.php');
require_once('../app/helper/helper.php');
error_reporting(E_ALL); ini_set('display_errors', 1); 
use Illuminate\Database\Capsule\Manager as DB;
/**
 * 
 */
class Temp
{
	
	function __construct()
	{
		$this->db = new Database;
		$this->db->connect();
		$this->db = $this->db->conn ;
	}


public function hospital(){
	$sql ="CREATE TABLE Hospitals (
		id int NOT NULL AUTO_INCREMENT,
		name varchar(255),
		email varchar(255),
		phone varchar(255),
		address varchar(255),
		PRIMARY KEY (id)
		)";
	DB::statement($sql);
}

public function doctor(){
	$sql ="CREATE TABLE Doctors (
		id int NOT NULL AUTO_INCREMENT,
		name varchar(255),
		email varchar(255),
		phone varchar(255),
		address varchar(255),
		hospital_id int,
		qualification varchar(255),
		PRIMARY KEY (id),
		FOREIGN KEY (hospital_id) REFERENCES Hospitals(id)
		)";
	DB::statement($sql);
}

public function blogs(){
	$sql ="CREATE TABLE Hospitals (
		name varchar(255),
		email varchar(255),
		phone varchar(255),
		Address varchar(255))";
	DB::statement($sql);
}

public function messages(){
	$sql ="CREATE TABLE Hospitals (
		name varchar(255),
		email varchar(255),
		phone varchar(255),
		Address varchar(255))";
	DB::statement($sql);
}

public function brands(){
	$sql ="CREATE TABLE Hospitals (
		name varchar(255),
		email varchar(255),
		phone varchar(255),
		Address varchar(255))";
	DB::statement($sql);
}

public function clients(){
	$sql ="CREATE TABLE Hospitals (
		name varchar(255),
		email varchar(255),
		phone varchar(255),
		Address varchar(255))";
	DB::statement($sql);
}

public function orders(){
	$sql ="CREATE TABLE Hospitals (
		name varchar(255),
		email varchar(255),
		phone varchar(255),
		Address varchar(255))";
	DB::statement($sql);
}

public function mail(){
//echo phpinfo();exit;
	$to = "medicalshopbd@gmail.com";
	$subject = "The subject";
	$message= "The test message";
	$headers = 'From:Medical Shop BD<admin@medicalshopbd.com>' . "\r\n" .
    'Reply-To:  info@medicalshopbd.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$send = mail($to, $subject, $message, $headers);
print_r($send);
}

public function e($value='')
{
// Switch
$ch = array(5,1,4,1,5);
//made it for fun jus use "E" if you like
$symbol = mb_convert_encoding('&#x1F60E;', 'UTF-8', 'HTML-ENTITIES');
$width = 5; // use 1 for default
$height = 5; // use 1 for default
for($x=$width, $y=$height, $position = 0 ; $position < count($ch); print "<br/>\n"){
$pattern = $ch[$position];
for($draw=0; $draw < $pattern*$x; $draw++, print $symbol){}
if(($y--)>0)
continue;
$position++;
$y = $height;
} 
}

	public function getNextFourProduct($id=100)
	{
		$sql = "SELECT * FROM products WHERE id >'".$id."' LIMIT 4";
		$query = $this->db->query($sql);
		$products = array();
		while($data = $query->fetch_assoc()){
			array_push($products, $data);
		}

		if(count($products))
			print_r($products);
		else echo "<strong>sorry ! </strong>No more products";

	}

	public function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
	{
	    $pieces = [];
	    $max = mb_strlen($keyspace, '8bit') - 1;
	    for ($i = 0; $i < $length; ++$i) {
	        $pieces []= $keyspace[random_int(0, $max)];
	    }
	    return implode('', $pieces);
	}

	public function addProducts($value='')
	{	

		$db = new Database;
		$db->connect();
		$db = $db->conn ;
		$count = 0;
		$error = 0;

		$helper = new Helper;

		$sql = "SELECT * FROM subcat WHERE 1";
		$data = $db->query($sql);
		// print_r($data);
		// //exit;
		while($sub = $data->fetch_assoc()){
			$subcatSlug = $sub['slug'];
				$name = $this->random_str(10);
				$model = $this->random_str(8);
				$slug = $helper->encodeText($name)."_".$helper->encodeText($model);
				$add = "INSERT INTO `products` ( `slug`,`name`, `model`, `price`, `stock`, `sub`, `likes`, `img1`, `img2`, `img3`, `img4`, `img5`, `thumb`, `pc`, `pm`, `active`, `psd`, `pfd`, `pfs`, `created_at`, `updated_at`) VALUES('".$slug."','".$name."', '".$name."', 13213, 1, '".$subcatSlug."', 1, './images/products/ecg_machine/adasd_1.jpeg', './images/products/ecg_machine/adasd_2.jpeg', './images/products/ecg_machine/adasd_3.jpeg', './images/products/ecg_machine/adasd_4.jpeg', './images/products/ecg_machine/adasd_5.jpeg', './images/products/ecg_machine/adasd_5.jpeg', './images/products/ecg_machine/adasd_pc.pdf', './images/products/ecg_machine/adasd_pm.pdf', 1, '".$this->random_str(131)."', '".$this->random_str(500)."', '".$this->random_str(500)."', now(), now())";

			
			$done = $db->query($add);
			if($done) $count++;
			else $error++;

		}

		if(!$error){
			echo $count." Products added";
		}

	}

	public function slug($value='')
	{
		$db = new Database;
		ini_set('max_execution_time', 600);
		if($db->slug())
			echo "<strong style='color:Green'>All slug are created :)</strong>";
		else 
			echo "<strong style='color:Red'>There was problem to create slug :(</strong>";
	}

	public function folders($value='')
	{
		$db = new Database;
		$folders = $db->makeImageFolders();
		if(!$folders) echo "<strong style='color:Green'>All folders are created successfully :)</strong>";
		else echo "<strong style='color:Green'>All folders are Created</strong> <i style='color:brown'>but there were ".$folders." dublicate subcat names. May be all folders were already there or your database subcat table may have dublicate entries.</i>";
	}

	public function images($value='')
	{
		$db = new Database;
		$db->import_image();
	}

	public function makeImageCol()
	{
		$db = new Database;
		$db->makeImageCol();
	}
}




?>
