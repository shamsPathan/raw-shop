<?php

require_once '../app/core/pdoDatabse.php';
// Products class for implementation 
use Illuminate\Database\Capsule\Manager as DB;


class Product extends PdoDatabse {


	public $id ;
	public $name ;
	public $rating ;
	public $slug ;
	public $model;
	public $price;
	public $stock;
	public $subcat;
	public $sub;
	public $likes;
	public $active;
	public $psd; // product short description
	public $pfd; // product full description
	public $pfs; // product features and specification
	public $created_at;
	public $updataed_at;
	public $thumb;
	public $img1;
	public $img2;
	public $img3;
	public $img4;
	public $img5;
	public $pc;
	public $pm;
	protected $pdo = null;
	protected $msg ;


	public function __construct(int $id = null)
	{	

		//it should be loaded dynamicly from center database info
		parent::__construct();
		$id?$this->loadById($id):"";

	}

	public function getByOffset($subcatSlug = null, $offset = null)
	{

		if($subcatSlug??null && $offset??null){

			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			$this->pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
			$this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

			$limit = 1;

			$sql = 'SELECT * FROM products WHERE sub=:subcat order by id desc LIMIT :limit OFFSET :offset';
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
			$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
			$stmt->bindParam(':subcat', $subcatSlug, PDO::PARAM_INT);
			$stmt->execute();
			$product = $stmt->fetch();
			//var_dump($product);exit;
			if($product){
				$this->loadObject($product);
				return true;
			}
			else 
				$this->msg = 'No product found';
			return false;

		}
		else {
			$this->msg = 'Give both, Offset and subcat id';
			return false;
		}
	}

	public function loadImage($id = null)
	{
		if($id){
			$this->id = (int)$id;	
		}

		if($this->id){
			$stmt = $this->pdo->prepare('SELECT id, pi1 FROM  image WHERE product = ?  limit 1');
			$stmt->execute([$this->id]);
			$product = $stmt->fetch();
			$this->image = $product['pi1'];
		}
	}


	public function load($subSlug = null, $dpt = null)
	{	
		//echo $subSlug;exit;
		if($subSlug){
			// sql
			$stmt = $this->pdo->prepare('SELECT * FROM products WHERE sub = ? and active = 1  order by id ASC limit 1');
			$stmt->execute([$subSlug]);
			$product = $stmt->fetch();
//print_r($product);exit;
			if($product){
				$this->loadObject($product);
				return true;  
			}else {
				$stmt = $this->pdo->prepare('SELECT * FROM products WHERE  active = 1  order by id DESC limit 1');
				$stmt->execute();
				$product = $stmt->fetch();
				$this->loadObject($product);
			}
		} else {
			$this->msg = "Give an subcat slug you bitch!";
			return false;
		}
	}

	public function getAll($subSlug = null)
	{	
		if($subSlug){
		
			$stmt = $this->pdo->prepare('SELECT * FROM products WHERE sub = ? and active = 1 order by id desc');
			$stmt->execute([$subSlug]);
			$products = array();
			while($product = $stmt->fetchObject()){
				array_push($products, $product);
			}
			
			if($products){
				return $products;  
			}
		} else {
			$this->msg = "Give an subcat slug you bitch!";
			return false;
		}
	}

	private function loadObject(Array $product){

				$this->id 		 = $product['id']; 
				$this->name  	 = $product['name']; 
				$this->slug  	 = $product['slug']; 
				$this->rating  	 = $product['rating']; 
				$this->model 	 = $product['model']; 
				$this->price 	 = $product['price']; 
				$this->stock 	 = $product['stock']; 
				$this->subcat 	 = $product['sub']; 
				$this->sub	 	 = $product['sub']; 
				$this->likes 	 = $product['likes'];
				$this->active 	 = $product['active'];  
				$this->psd 	 	 = $product['psd'];  
				$this->pfd 	 	 = $product['pfd'];  
				$this->pfs 	 	 = $product['pfs'];
				$this->thumb 	 = $product['thumb'];
				$this->img1 	 = $product['img1'];
				$this->img2 	 = $product['img2'];
				$this->img3 	 = $product['img3'];
				$this->img4 	 = $product['img4'];
				$this->img5 	 = $product['img5'];
				$this->pc 	 	 = $product['pc'];
				$this->pm 	 	 = $product['pm'];
	}

	public function loadById($productID = null)
	{
		if($productID){
			// sql
			$stmt = $this->pdo->prepare('SELECT * FROM products WHERE id = ? limit 1');
			$stmt->execute([$productID]);
			$product = $stmt->fetch();

			if($product){
				$this->loadObject($product);
				return true;  
			}
		} else {
			$this->msg = "Give an product id you bitch!";
			return false;
		}
	}

	public function loadBySlug($productSlug = null)
	{
		if($productSlug){
			// sql
			$stmt = $this->pdo->prepare('SELECT * FROM products WHERE slug = ? limit 1');
			$stmt->execute([$productSlug]);
			$product = $stmt->fetch();

			if($product){
				$this->loadObject($product);
				return true;  
			}
		} else {
			$this->msg = "Give an product slug you bitch!";
			return false;
		}
	}

	public function save()
	{
		$product =  DB::table('products')->where('id', $this->id)->first();
		
		foreach($product as $key=>$value):
			if(isset($this->$key)):
				$product->$key = $this->$key;
			endif;
		endforeach;

		$save = DB::table('products')->where('id', $product->id)->update((array)$product);
		
		if($save): 
			return $product;
		else:  
			return null;
		endif;
	
	}


}

?>