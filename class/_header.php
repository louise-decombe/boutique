<?php
//liste des fichiers de classes nécessaires
require_once 'class/db.php';
require  'class/panier.class.php';
require 'class/wishlist.class.php';
require_once 'class/users.php';
//initialisation du panier en lui envoyant la base de donnée
$DB = new DB();
$panier = new panier($DB);
$wishlist = new wishlist($DB);
$users=new Users($DB);
?>
