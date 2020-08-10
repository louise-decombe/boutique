<?php
class wishlist{

	private $DB;

	public function __construct($DB){
		if(!isset($_SESSION['user'])){
			session_start();
		}
		$this->DB = $DB;

		if(isset($_GET['delWishlist'])){
			$this->del($_GET['delWishlist']);
		}
	}

	public function del($product_id){
		unset($_SESSION['wishlist'][$product_id]);
	}

}
