<?php
class panier
{
    private $DB;

    public function __construct($DB)
    {
        // vérifier que la session existe : variables stockées tout au long de la navigation
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['panier'])) {
            // création d'un panier vide
            $_SESSION['panier'] = array();
        }
        $this->DB = $DB;

        if (isset($_GET['delPanier'])) {
            $this->del($_GET['delPanier']);
        }
        if (isset($_POST['panier']['quantity'])) {
            $this->recalc();
        }
    }

    public function recalc()
    {
        foreach ($_SESSION['panier'] as $product_id => $quantity) {
            if (isset($_POST['panier']['quantity'][$product_id])) {
                $_SESSION['panier'][$product_id] = $_POST['panier']['quantity'][$product_id];
            }
        }
    }

    public function count()
    {
        //fonction qui permet de faire la somme du panier
        return array_sum($_SESSION['panier']);
    }

    public function total()
    {
        $total = 0;
        // récupération de l'ensemble des produits pour faire 1 requête pour le total
        $ids = array_keys($_SESSION['panier']);
        if (empty($ids)) {
            $products = array();
        } else {
            $products = $this->DB->query('SELECT id, price FROM article WHERE id IN ('.implode(',', $ids).')');
        }
        foreach ($products as $product) {
            // récupération et incrémentation du prix total
            //retourne la quantité du panier
            $total += $product->price * $_SESSION['panier'][$product->id];
        }
        return $total;
    }

    public function add($product_id)
    {
        // si j'ai au moins déjà ce produit ajouté au panier j'en rajoute +1 avec une incrémentation
        if (isset($_SESSION['panier'][$product_id])) {
            $_SESSION['panier'][$product_id]++;
        //si je n'ai pas le produit dans le panier je l'ajoute pour la première fois
        } else {
            $_SESSION['panier'][$product_id] = 1;
        }
    }

    public function del($product_id)
    {
        unset($_SESSION['panier'][$product_id]);
    }
}
