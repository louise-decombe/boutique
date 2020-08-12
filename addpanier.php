<?php $page_selected = 'addpanier.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>boutique - addpanier</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/0mKd0xT/icon-round-fanzine.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<header>
    <?php
    include("includes/header.php");
   ?>
</header>


<?php

$json = array('error' => true);
if(isset($_GET['id'])){
	$product = $DB->query('SELECT id FROM article WHERE id=:id',
	 array('id' => $_GET['id']));
	if(empty($product)){
		$json['message'] = "Ce produit n'existe pas";
	}else{
		$panier->add($product[0]->id);
		$json['error']  = false;
		$json['total']  = number_format($panier->total(),2,',',' ');
		$json['count']  = $panier->count();
		$json['message'] = 'Le produit a bien ete ajoute a votre panier';
	}
}else{
	$json['message'] = "Vous n'avez pas selectionné de produit à ajouter au panier";
}
echo json_encode($json);

?>

<a href="index.php">retour</a>
<a href="panier.php">voir mon panier</a>
