<?php

class UserModel extends Database {
	//paraent::
	// $db 	  		 =	NULL ;
	// $queryResult  =	NULL ; // query result will automaticly stored here
	public $data = [];

	function __construct() {

		//echo "user model constructor passed";
	}



	public function authUser($user, $pass):bool{
		
		$sql = "SELECT `id` FROM `users` WHERE username='".$user."' AND password='".$pass."'";
		//query to database
		$dataObj = $this->db->query($sql);
		//checking is there any returned data
		if($dataObj->num_rows > 0){
			$user = $dataObj->fetch_object();
			//geting data object and pointing to value
			return $user->id;
		} else 
		//print_r($dataObj);exit;
		return false;
	}


	public function homeData(){

		$this->data = "Some Data";
		
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
	function insertProduct($data){
		print_r($data);
		$sql = "INSERT INTO products(`name`,`model`, `price`,`des`,`details`,`techSpec`) VALUES('".$data['name']."','".$data['model']."','".$data['price']."','".$data['des']."','".$data['details']."','".$data['techSpec']."')";
		//echo $sql;exit;
		echo($this->db->query($sql));
	}


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