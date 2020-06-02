<?php
require_once '../app/core/database.php';
//add page model
require_once '../app/models/PageModel.php';
//add Product model
require_once '../app/models/ProductModel.php';
//add User model
require_once '../app/models/UserModel.php';
// Product class
require_once '../app/class/Product.php';

use Illuminate\Database\Capsule\Manager as DB;

class Model extends Database {
	//paraent::
	// $db 	  		 =	NULL ;
	// $queryResult  =	NULL ; // query result will automaticly stored here
	public $data = [];
	public $conn ;


	function __construct() {
		$this->connect();
		$this->db = $this->conn;

		//create page model
		$this->page = new PageModel;
		//create Product model
		$this->product = new ProductModel;
		//create User model
		$this->user = new UserModel;

	}

	public function test()
	{
		
	}
// API SECTION
	public function getNextFourProduct(int $id=100, string $subcat)
	{

		$sql = "SELECT * FROM products WHERE id <'".$id."' AND `sub`='".$subcat."' ORDER BY id DESC LIMIT 4";
		$query = $this->db->query($sql);
		$products = array();

		while($data = $query->fetch_assoc()){
			array_push($products, $data);
		}

		if(count($products))
			return $products;
		else
			return false;


	}

//API SECTION END


	public function getAllActiveProducts()
	{
		return  DB::table('products')->where('active', 1)
				->select('id', 'name', 'model', 'price', 'stock', 'thumb', 'active')
				->get();
	}


	public function makeProductActive(Product $product)
	{
		if(!$product->active){
			$product->active = !$product->active;
			return $product->save();
		}
	}

	public function makeProductDeactive(Product $product)
	{
		if($product->active){
			$product->active = !$product->active;
			return $product->save();
		}
	}


	public function getAllDeactiveProducts()
	{
		return  DB::table('products')->where('active', 0)
				->select('id', 'name', 'model', 'price', 'stock', 'thumb', 'active')
				->get();
	}

	public function getSubcatByOffset($cat='', $offset)
	{
		$sql = "SELECT * FROM `subcat` WHERE `cat_id`='".(int)$cat."' LIMIT ".(int)$offset."";
		$data = $this->db->query($sql);
		$data = $data->fetch_object();
		return $data;

	}
	public function getSingleProductData(int $id = 0)
	{	//echo $id;exit;
		$sql = "SELECT * FROM `products` WHERE `id`='".$id."'";

		$data = $this->db->query($sql);

		$product = new stdClass();

		if($data == TRUE) {

			$product->data = $data->fetch_object();

			$sql = "SELECT * FROM `image` WHERE `product`='".$id."'";
			$data = $this->db->query($sql);

			if($data == TRUE) {

				$product->images = $data->fetch_object();
				return $product;
			}

			//var_dump();exit;

		}
		else
			return false;		# code...
	}
	public function getProduct($id)
	{
		$sql = "SELECT * FROM `products` WHERE `subcat`='".$id."'";

		$data = $this->db->query($sql);
		$products = [];
		if($data == TRUE) {
			while($product = $data->fetch_object()){
				$products[] = $product;
			}
			return $products;
		}
		else
			return false;

	}

	public function getProductByOffset($id, $offset)
	{
		$sql = "SELECT * FROM `products` WHERE `subcat`='".$id."' LIMIT 3 OFFSET ".(int)$offset."";
		$data = $this->db->query($sql);
		$products = [];
		if($data == TRUE) {
			while($product = $data->fetch_object()){
				$products[] = $product;
			}
			return $products;
		}
		else
			return false;

	}

	public function getCatName($catSlug){
		//echo $catID;exit;
		$sql = "SELECT * FROM `cat` WHERE `slug`='".$catSlug."'";
		$catData = $this->db->query($sql);

		if($catData == TRUE) {
			$data = $catData->fetch_object();
			return $data;
		}
		else
			return false;

	}
################ Dpt Cat Subcat


	public function insertProduct(Array $data)
	{

		
			//echo "hello";exit;
			include_once("../app/helper/helper.php");
			//create images
			$helper = new Helper;
			// print_r ($data);exit;
			$imageName = $helper->encodeText($data['name']);
			$path = "./images/products/".$data['subcategory']."/";

			if(!file_exists($path)){
				if (!@mkdir($path)) {
					$error = error_get_last();
					echo $error['message'];
				}	
			}

			// echo $path;exit;
			$imagePath[1] = isset($data["pi1"])?$path.$imageName."_1".".jpeg":null;
			
			$imagePath[2] = isset($data["pi2"])?$path.$imageName."_2".".jpeg":null;

			$imagePath[3] = isset($data["pi3"])?$path.$imageName."_3".".jpeg":null;

			$imagePath[4] = isset($data["pi4"])?$path.$imageName."_4".".jpeg":null;

			$imagePath[5] = isset($data["pi5"])?$path.$imageName."_5".".jpeg":null;

			//save pdf
			$pcPath = isset($data["pc"])?$path.$imageName."_pc.pdf":null;
			$pmPath = isset($data["pm"])?$path.$imageName."_pm.pdf":null;
			

			if($pcPath){
				file_put_contents($pcPath, $data["pc"] );				
			}
			if($pmPath){
				file_put_contents($pmPath, $data["pm"] );	
			}
			
			for($i=1; $i<=5; $i++){
				if(isset($data["pi".$i])){
					// print_r($data["pi".(string)$i]);exit;
					$helper->saveImageToPath($data["pi".(string)$i], $imagePath[$i]);	
				}
				
			}

			$thumb = $path.$imageName.".jpeg";
			$helper->makeThumb($data['pi1'], $thumb);


			//echo $path;exit;



			$prepared = $this->db->prepare("INSERT INTO `products` (`name`,`slug`, `rating`,`model`, `price`, `stock`, `sub`, `likes`, `psd`, `pfd`, `pfs`, `created_at`, `updated_at`,`img1`,`img2`,`img3`,`img4`,`img5`,`pc`,`pm`,`thumb`)

			VALUES(?,?,?,?,?,?,?,'1',?,?,?,now(),now(),?,?,?,?,?,?,?,?)");

			$result = $prepared->bind_param("ssisiissssssssssss",
				$data['name'],
				$data['slug'],
				$data['rating'],
				$data['model'],
				$data['price'],
				$data['stock'],
				$data['subcategory'],
				$data['psd'],
				$data['pfd'],
				$data['pfs'],
				$imagePath[1],
				$imagePath[2],
				$imagePath[3],
				$imagePath[4],
				$imagePath[5],
				$pcPath,
				$pmPath,
				$thumb
			);

			$done = $prepared->execute();

		if ($done === TRUE) {
			//echo "got here";exit;
			$data['alert']['success'] = "Data was inserted succesfully";
			return true;
		}
	}

	function insertImage($productID, $data){
		// Insert Image data

		$sql = "INSERT INTO `image` (`pi1`, `pi2`, `pi3`, `pi4`, `pi5`, `pc`, `pm`,`product`) VALUES ('".$data['pi1']."','".$data['pi2']."','".$data['pi3']."','".$data['pi4']."','".$data['pi5']."','".$data['pc']."','".$data['pm']."','".$productID."')";

		$dataObj = $this->db->query($sql);
		if ($dataObj === TRUE) {
			return true;
		} else {
			return false;
		}


	}


	public function getManue(){

		$this->menue['dpt'] = $this->getDpt();

		foreach($this->menue['dpt'] as $id=>$name){
			$this->menue['cat'][$id] = $this->getCat($id);

			foreach($this->menue['cat'][$id] as $catId=>$cat){
				//echo $catId."\n";
				$this->menue['subcat'][$catId] = $this->getSub($catId);
			}

			foreach($this->menue['subcat'] as $id=>$value){
				print_r($value)."############";
			}
			exit;

		}


		print_r($this->menue['subcat']);exit;
		return $this->menue;
	}

	public function getDpt(){

		$sql = "SELECT * FROM `dpt` WHERE 1";
		$dataObj = $this->db->query($sql);
		// got object
		$data =  ($dataObj->num_rows > 0)?
		$dataObj : null;
		//checked object , has data?
		if($data){
			while($data = $dataObj->fetch_object()){
				$this->dpt[] = $data;
			}

			return $this->dpt;
		}
		return null;

	}



	public function getCatId(int $dptID = null){

		$sql = "SELECT * FROM `cat` WHERE `dept_id`='".$dptID."'";
		$dataObj = $this->db->query($sql);

		$data =  ($dataObj->num_rows > 0)?
		$dataObj : null;

		if($data){
		// make some bug fixing
			while($data = $dataObj->fetch_object()){
				$cat[$data->id] = $data->nameEN;
			}
			return $cat;
		} else
		return null;
	}

	public function getCat(int $dptID = null){

		$sql = "SELECT * FROM `cat` WHERE `dept_id`='".$dptID."'";
		$dataObj = $this->db->query($sql);

		$data =  ($dataObj->num_rows > 0)?
		$dataObj : null;

		if($data){
		// make some bug fixing
			while($data = $dataObj->fetch_object()){
				$cat[] = $data;
			}
			return $cat;
		} else
		return null;
	}

	public function getIdBySlug($slug='', $table)
	{
		$sql = "SELECT * FROM `".$table."` WHERE `slug`='".$slug."'";
		$dataObj = $this->db->query($sql);

		$data =  ($dataObj->num_rows > 0)?
		$dataObj : null;
//var_dump($data);exit;
		if($data){
		// make some bug fixing
			$sub= $dataObj->fetch_object();
			return $sub;
		}
		else return null;
	}

	public function getSub(String $catId){

		$sql = "SELECT * FROM `subcat` WHERE `cat_id`='".$catId."'";
		$dataObj = $this->db->query($sql);

		$data =  ($dataObj->num_rows > 0)?
		$dataObj : null;
//var_dump($data);exit;
		if($data){
		// make some bug fixing
			while($data = $dataObj->fetch_object()){
				$sub[] = $data;
			}
			//print_r($sub);exit;
			return $sub;
		}
		else return null;
	}

	public function homeData(){

		$this->data = $this->page->loadHomeData();

		return $this->data;
	}

	public function productsData(){

		$dataObj = $this->getAllFrom('products');

		if(!is_object($dataObj)){

			$this->data = $dataObj;
		}
		else {

			while($data = $dataObj->fetch_object()){
				$this->data[] = $data;
			}
		}
			// debug
			//print_r($this->data);

		return $this->data;
	}

////////////////////////

	private function getAllFrom( String $table ){

		$sql = "SELECT * FROM `".$table."` WHERE 1";

		$dataObj = $this->db->query($sql);

		return ($dataObj->num_rows > 0)?
		$dataObj :
		"No Data Found";

	}

// // // // // // // // // // //

	public function productData(){

		$this->data = "single Data";

		return $this->data;
	}

	public function aboutData(){

		$this->data = "single Data";

		return $this->data;
	}

	public function servicesData(){

		$this->data = "single Data";

		return $this->data;
	}


















////////////////////////////
	// function insertProduct($data){
	// 	print_r($data);
	// 	$sql = "INSERT INTO products(`name`,`model`, `price`,`des`,`details`,`techSpec`) VALUES('".$data['name']."','".$data['model']."','".$data['price']."','".$data['des']."','".$data['details']."','".$data['techSpec']."')";
	// 	//echo $sql;exit;
	// 	echo($this->db->query($sql));
	// }


	function getMenuArray($tableName='catagories'){

		$menu 		= [];
		$fieldArray = array("catName","catDes");
		$menu 		= $this->db->getFieldData( $tableName, $fieldArray );
//		echo "Hello<br>";
//		print_r($menu);
		return $menu;

	}

	function getSubmenuArray($menuId){

		$menu 		= [];
		$tableName = "subCat";
		$fieldArray = array("subcatNameEn","subcatNameBn");
		$menu 		= $this->db->getFieldData( $tableName, $fieldArray , $menuId );
//		echo "Hello<br>";
//		print_r($menu);
		return $menu;

	}

	function getData($menu='' , $submenu='home') {

		$tableName = $menu."-".$submenu;

		echo "##########".$tableName."#########";
			/// else if any catagory selected

		$title = array();
		$content = array ();

		if($menu=='home'){

			$title = array("Home Page Data","বাললাদেশস","c","i","d","e","n","t","i","j","k");
			$content = array ("aaaa","bbb","cccc","dddd","eeeee","ffff","ggg","hhh","iii","jjj","kkk");
			return array($title, $content);
		}
		elseif($submenu=='home')
		{

			$title = array("Default Values for home","বাললাদেশস","c","i","d","e","n","t","i","j","k");
			$content = array ("aaaa","bbb","cccc","dddd","eeeee","ffff","ggg","hhh","iii","jjj","kkk");
			return array($title, $content);
		}


		$sql = "SELECT `title`, `content` FROM `".$tableName."` LIMIT 11";
		$data = $this->db->query($sql);
		//	print_r($data);



		if( $data->rowCount()>10)
		{
			while($r = $data->fetch(PDO::FETCH_ASSOC))
			{	//echo "<br>"; print_r($r);

//				print($r['title'])."<br><hr>";
		array_push($title  , $r['title'] );
		array_push($content ,$r['content'] );
	}
}
else
{

	$title = array("not Enough Data in database","বাললাদেশস","c","i","d","e","n","t","i","j","k");
	$content = array ("aaaa","bbb","cccc","dddd","eeeee","ffff","ggg","hhh","iii","jjj","kkk");
}

return array($title, $content);

}


function getCatagoryId($catName){

	$id = 0;
	$sql = "SELECT catID FROM catagories WHERE catName = '".$catName."' ";
	$data = $this->db->query($sql);
	$data = $data->fetch(PDO::FETCH_NUM);
	return $data[0];
}



function insertNews( $table , $title , $content ){

//		$fieldString = implode(",", $fields);
//		$fieldString = $fieldString.", cat_id , subcat_id";
	$sql = "INSERT INTO `".$table."` (`id`, `title`, `content`, `created_at`, `updated_at`, `subcat_id`, `cat_id`, `published`, `viewed`) VALUES (NULL, '".$title."', '".$content."', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 0, 0, 0, 0)";
	if($this->db->query($sql))

		echo "submitted"."<br>";
	print_r($sql);



}
}
