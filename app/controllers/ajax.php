
<?php

class Ajax extends Controller {


	function __construct(){

		parent::__construct(); //with database
		
	}
	public function index($value='')
	{
			$this->helper->error(true);
	}

	
	public function getProduct($subcatID, $offset) {
		//echo $offset;exit;
		$product = new Product;
		//$product->getByOffset((int)$subcatID, (int)$offset);
		$get = $product->getByOffset((int)$subcatID, (int)$offset);
		if($get){

			echo json_encode(
				['id'=>$product->id,
				'name'=>$product->name,
				'model'=>$product->model,
				'price'=>$product->price],
				JSON_FORCE_OBJECT
			);
		}
		else {
			echo $product->msg;
		}

		
		//include '../app/views/partial/catagoryPagePBlock.php';
	}

	public function getImage($productID='')
	{
		if((int)$productID){

			$product = new Product;
			$product->loadImage($productID);
			if($product->image){
				$image = "data:image/png;base64,".base64_encode($product->image)."";
				echo $image;
			} 
			else
				echo null;
		}
	}

	public function getInfo($productID='')
	{
		if((int)$productID){

			$product = new Product;
			$product->loadById($productID);
			echo  json_encode($product);
			
		}
	}

	public function get_dpt(bool $call = false) {

		$data['dpt'] = $this->model->getDpt();

		if($call){
			return $data;	
		}	else 
		echo json_encode($data);	
	}	

	public function get_cat(int $dpt = null) {
		$data = [];

		if($dpt){
			$data['cat'] = $this->model->getCat((int)$dpt);
		}
		else
			$data['error'] = "please add department info";

		echo json_encode($data);

	}	

	public function get_sub(int $cat = null) {
		$data = [];

		if($cat){
			$data['sub'] = $this->model->getSub((int)$cat);
		} 
		else 
			$data['error'] =  "please add department info";

		//return 
		echo json_encode($data);		
	}	

	public function saveProduct() {

		$data['name'] = $_POST['name'];
		$data['model'] = $_POST['model'];
		$data['price'] = $_POST['price'];
		$data['des'] = $_POST['des'];
		$data['details'] = $_POST['details'];
		$data['techSpec'] = $_POST['techSpec'];
		// validate


		//insert
		$this->model->insertProduct($data);		
	}	





}



?>