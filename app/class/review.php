<?php



/**
 * 
 */
class Review extends Database
{
	
	private $name;
	private $email;
	private $productSlug;
	private $userId;
	private $text;

	function __construct($data = null)
	{
		$this->connect();
		if($data){
			$this->name = $data['name'];
			$this->email = $data['email'];
			$this->productSlug = $data['productSlug'];
			$this->userId = $data['userId'];
			$this->text = $data['text'];	
		}

	}

	public function save()
	{
		//print_r($this->conn); exit;
		$sql = "INSERT INTO `review` (`name`,`email`,`product_slug`,`user_id`,`text`) VALUES(?,?,?,?,?)";
		$prepared = $this->conn->prepare($sql);
		$result = $prepared->bind_param("sssis",
			$this->name,
			$this->email,
			$this->productSlug,
			$this->user_id,
			$this->text
		);
		$done = $prepared->execute();
		if($done)
			return true;
		else 
			return false;
	}

	public function get(String $productSlug)
	{
		$helper = new Helper();
		
		$sql = "SELECT * FROM `review` WHERE `product_slug`='".$helper->sanitizeString($productSlug)."'";
		$query = $this->query($sql);
		$reviews = array();
		
		while($result = $query->fetch_object()){
			array_push($reviews, $result);
		}
		
		return $reviews;
	}

}