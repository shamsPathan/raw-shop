<?php
include_once('../app/helper/helper.php');
/**
 * 
 */
class MyCart extends Database
{

	//Product Id
	public $products;
	private $cart = false;
	public $msg = null;


	function __construct()
	{
		if (!session_id()) {
			session_start();
		}
		$this->helper = new Helper();

		//check if any old cart

		if ($_SESSION['cart'] ?? null) {

			$this->cart = true;
			//load cart from session
			$this->products = $_SESSION['cart'];
		} else {
			$_SESSION['cart'] = array();
		}
	}

	//recieve order and save to database
	public function index($value = '')
	{
		echo "Welcome to Cart feature";
	}
	public function saveOrder(int $token = null)
	{
		if (!$token) {
			$this->helper->error(true);
		}

		$this->connect();
		//var_dump($this->products);exit;

		foreach ($this->products as $key => $product) {
			$sql = "INSERT INTO `order_product` (`order_token`,`product_id`, `qty`) 
			VALUES(?,?,?)";
			$prepared = $this->conn->prepare($sql);
			$result = $prepared->bind_param(
				"sii",
				$token,
				$product['id'],
				$product['qt']
			);
			$done = $prepared->execute();
			if (!$done)
				return false;
		}
		return true;
		//connection
		// gether cart informations
		//save to database
		//write message
		//redirect to congratulation page
	}



	private function inCart(int $id = null)
	{
		if (!$id) {
			$this->helper->error(true);
		}
		//print_r($this->products);
		if ($this->products ?? null) {
			foreach ($this->products as $product) {
				if ($product['id'] == $id) {
					return array("id" => $product['id'], "qt" => $product['qt']);
					break;
				}
			}
		}

		return 0;
	}


	public function add($id = null, $qt = 1)
	{
		if (!$id) {
			$this->helper->error(true);
		}

		if ($id) {

			//if id exists
			if ($product = $this->inCart($id)) {

				$product['qt'] += $qt;
				$this->updateQt($product['id'], $product['qt']);
			} else {
				//else go down to write it

				// write to session cart
				$this->write($id, $qt);
				echo json_encode(["msg" => "added"]);
			}
			// add quantity to that id			

		}
	}

	public function updateQt(int $id = null, int $qt = null)
	{
		if (!$id || !$qt) {
			$this->helper->error(true);
		}

		if ($id && $qt) {
			$done = false;
			// write to session cart
			foreach ($this->products as &$product) {
				if ($product["id"] == $id) {
					//if there is valid product
					$product["qt"] = $qt;
					$_SESSION['cart'] = $this->products;
					echo json_encode(["id" => $product["id"], "qt" => $product["qt"]]);
					return;
				}
			}
			echo json_encode(["msg" => "false"]);
		}
	}

	public function remove($id = null)
	{
		if (!$id) {
			$this->helper->error(true);
		}

		if ($id) {

			print_r($this->products);

			for ($i = 0; $i < count($this->products); $i++) {
				if ($this->products[$i]['id'] == $id) {
					unset($this->products[$i]);
					$this->msg = true;
					break;
				}
			}

			sort($this->products);
			$_SESSION['cart'] = $this->products;
			print_r($this->products);
			exit;

			if (in_array($id, $this->products)) {
				unset($this->products[array_search($id, $this->products)]);
				$this->msg = true;
				$this->products = array_values($this->products);
				$_SESSION['cart'] = $this->products;
			} else {

				$this->msg = "There is no item in CART like you supplied";
			}
			echo json_encode($this);
		}
	}

	public function empty()
	{
		if (!isset($_SESSION['cart'])) {
			$this->helper->error(true);
		}

		if ($this->cart) {
			unset($_SESSION['cart']);
			echo json_encode(["empty" => true, "msg" => "All Items are removed from cart"]);
		} else
			echo json_encode(["empty" => false, "msg" => "Thre are no items in cart"]);
	}

	public function get()
	{
		if ($this->cart) {
			echo json_encode(["products" => $this->products]);
		} else {
			echo "404";
		}
	}

	public function write($id = null, $qt = 1)
	{
		if (!$id) {
			$this->helper->error(true);
		}

		if ($id) {
			array_push($_SESSION['cart'], ["id" => $id, "qt" => $qt]);
			$this->message =  "product Added";
			return true;
		} else {
			$this->message =  "product Not Added";
			return false;
		}
	}
}
