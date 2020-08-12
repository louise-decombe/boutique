<?php $page_selected = 'whishlist.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>boutique - whishlist</title>
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
<div class="checkout">
	<div class="title">
		<div class="wrap">
		<h2 class="first">Wish List</h2>
    <p>Retouvez ici les articles que vous aimez</p>
		</div>
	</div>
	<form method="post" action="wishlist.php">
	<div class="table">
		<div class="wrap">


			<?php

      $bdd = new PDO('mysql:host=localhost;dbname=boutique;charset=utf8', 'root', '');

      $requete = $bdd->prepare('
                  INSERT INTO wishlist (nom)
                  VALUES(:nom)'
              ) or exit(print_r($req->errorInfo()));
              $requete->execute( array( 'nom' => $_POST['nom'] ) );
              $requete->closeCursor();
          }
		 ?>

	</div>
	</form>
	<a href="profil.php">Retour au profil</a>
</div>
<?php }else{

echo "vous ne pouvez pas accéder à cette page sans vous <a href='connexion.php'> connecter </a> ou bien vous
<a href='subscription.php'> inscrire </a>";

} ?>
