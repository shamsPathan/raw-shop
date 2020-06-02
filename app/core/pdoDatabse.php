<?php
require_once '../app/dbconfig.php';

require_once '../app/core/pdoDatabse.php';
require_once '../app/core/database.php';
require_once '../app/class/order.class.php';
require_once '../app/class/NoticeClass.php';
include_once '../app/class/user.class.php';
include_once '../app/class/Product.php';

class PdoDatabse
{

	protected $pdo = null;
	protected $msg;

	public function __construct()
	{
		return $this->dbConnect();
		$this->order = new Order();
		$this->notice = new NoticeClass();
		$this->user = new User();
		$this->product = new Product();
	}

	public function dbConnect()
	{

		if (session_status() === PHP_SESSION_ACTIVE) {
			try {

				$instance =  ConnectDb::getInstance();
				$this->pdo = $instance->getConnection();

				if (!$this->pdo) {
					throw new Exception("hello!");
				} else {
					return $this->pdo;
				}
			} catch (Exception $e) {
				$this->msg = 'Connection did not work out!';
				echo "DB error!";
				exit;
				return false;
			}
		} else {
			$this->msg = 'Session did not start.';
			return false;
		}
	}
}
