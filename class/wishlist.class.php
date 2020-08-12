<?php
class wishlist{

	private $db;

	public function __construct($db){
		$this->db = $db;
		
		if(!isset($_SESSION['user'])){
			session_start();
		}
		

		if(isset($_GET['delWishlist'])){
			$this->del($_GET['delWishlist']);
		}
	}

	public function del($product_id){
		unset($_SESSION['wishlist'][$product_id]);
	}

}
?>

