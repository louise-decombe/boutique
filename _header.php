<?php
//liste des fichiers de classes nécessaires
//require 'db.class.php';
require 'panier.class.php';
//initialisation du panier en lui envoyant la base de donnée
//$DB = new DB();
$panier = new panier($DB);
?>