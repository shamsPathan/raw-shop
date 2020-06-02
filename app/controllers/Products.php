<?php

class Products extends Controller
{
	

	public function index($submenu='home') {

		// //$this->dataArray = $this->getData('home', $submenu );
		// $this->menuArray = "something";
		// $this->submenuArray = "some submenues";
		// $this->dataArray = "some data";
		
		// $this->view->Show("main/allproducts", $this->menuArray ,
		// 	$this->submenuArray ,
		// 	$this->dataArray
		// );

		echo "<br><br>THE END from Products Class ";

	}

	public function single($submenu='home') {

		//$this->dataArray = $this->getData('home', $submenu );
		$this->menuArray = "something";
		$this->submenuArray = "some submenues";
		$this->dataArray = "some data";
		
		$this->view->Show("main/singleproduct", $this->menuArray ,
			$this->submenuArray ,
			$this->dataArray
		);

		echo "<br><br>THE END from index of HOME";

	}



	

}
