<?php
//liste des fichiers de classes nécessaires
require_once 'class/db.php';
require  'class/panier.class.php';
//initialisation du panier en lui envoyant la base de donnée
$DB = new DB();
$panier = new panier($DB);
?>
