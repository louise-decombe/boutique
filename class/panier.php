<?php
class Panier{

	private $db;

	public function __construct($db){

		$this->db = $db;
		// vérifier que la session existe : variables stockées tout au long de la navigation
		if(!isset($_SESSION)){
			session_start();
		}

		if(!isset($_SESSION['panier'])){
			// création d'un panier vide
			$_SESSION['panier'] = array();
		}

		if(isset($_GET['delPanier'])){
			$this->del($_GET['delPanier']);
		}

		if(isset($_POST['panier']['quantity'])){
			$this->recalc();
		}
	}

	public function recalc(){
		foreach($_SESSION['panier'] as $product_id => $quantity){
			if(isset($_POST['panier']['quantity'][$product_id])){
				$_SESSION['panier'][$product_id] = $_POST['panier']['quantity'][$product_id];
			}
		}
	}

	public function count(){
		//fonction qui permet de faire la somme du panier
		return array_sum($_SESSION['panier']);
	}

	public function total(){
		$total = 0;
		// récupération de l'ensemble des produits pour faire 1 requête pour le total
		$ids = array_keys($_SESSION['panier']);
		if(empty($ids)){
			$products = array();
		}else{
			$products = $this->db->query('SELECT id_article, prix_article FROM article WHERE id_article IN ('.implode(',',$ids).')');
		}
		foreach( $products as $product ) {
			// récupération et incrémentation du prix total
			//retourne la quantité du panier
			$total += $product->prix_article * $_SESSION['panier'][$product->id_article];
		}
		return $total;
	}

	public function add($product_id){
		// si j'ai au moins déjà ce produit ajouté au panier j'en rajoute +1 avec une incrémentation
		if(isset($_SESSION['panier'][$product_id])){
			$_SESSION['panier'][$product_id] ++;
		}else{

			$_SESSION['panier'][$product_id] = 1;

		}


	}

	public function del($product_id){
		unset($_SESSION['panier'][$product_id]);
	}


    // CHECK QUANTITÉ DISPONIBLE EN STOCK
	public function check_stock($id_article){

			$check = $this->db->query("SELECT id_article, nb_articles_stock FROM stock WHERE id_article =  ".$id_article."");

		return $check;
	}

	public function sub_total($prix_product, $nb_product) {

        $calcul = $prix_product * $nb_product;

        return $calcul;
    }

}
