
<?php

require_once('../app/class/world.class.php');

class Api extends Controller {


	function __construct(){

		parent::__construct(); //with database
		
	}

	public function get_countries()
	{
		$world = new World();
		echo json_encode($world->getCountry());
	}

	public function get_cities(int $state = null)
	{
		$world = new World();
		if($state){
			echo json_encode($world->getcities($state));	
		} else {
			echo json_encode(array("error"=>"no id passed"));
		}
		
	}

	public function get_states(int $country = null)
	{
		$world = new World();
		echo json_encode($world->getstates($country));
	}


	public function index() {
		$this->helper->error(true);
	}

	public function getNextFourProduct(int $id=null)
	{
		if(!$id){
			$this->helper->error(true);
		}

		$product = new Product($id);

		$products = $this->model->getNextFourProduct((int)$id, (string)$product->subcat);

		if($products)
			echo json_encode($products);
		else
			echo json_encode(false);

	}

	public function get_dpt(bool $call = false) {
		
		$data['dpt'] = $_SESSION['website']['dpt'];
		
		if($call){
			return $data;	
		}	else 
			echo json_encode($data);	
	}	

	public function get_cat(int $dpt = null) {
		
		if(!$dpt){
			$this->helper->error(true);
		}

		$data = [];

		if($dpt){
			$data['cat'] = $_SESSION['website']['cat'][$dpt]??null;
		}
		else
			$data['error'] = "please add department info";

		echo json_encode($data);
		
	}	

	public function get_sub(string $cat = null) {
		$data = [];
		$cat = (string)$cat;

		if($cat){
			$data['sub'] = $_SESSION['website']['sub'][$cat]??null;
		} 
		else 
			$data['error'] =  "please add department info";

		//return 
		echo json_encode($data);		
	}	

	public function saveProduct() {

		if(isset($data['name']) && isset($data['model']) &&
			isset($data['price']) &&  isset($data['des'])	){

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
		else {
			$this->helper->error(true);
		}
	}	

	



}



?>
