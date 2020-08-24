<?php $page_selected = 'addpanier'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>boutique - addpanier</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/0mKd0xT/icon-round-fanzine.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/style-panier.css">
</head>
<body>
	<header>
    	<?php
    		include("includes/header.php");
   		?>
	</header>
	<main>
		<section id="container-panier">

	<?php

		
		if(isset($_GET['id'])){

			$id_test = $_GET['id'];

			// check dans la table stock pour vérifier la disponibilité du produit
			$check = $panier->check_stock($id_test);	
			//var_dump($check[0]->nb_articles_stock);

			if  ($check[0]->nb_articles_stock > 0 ){ 

				
			$product = $db->query('SELECT id_article FROM article WHERE id_article = :id', array('id'=> $_GET['id']));
			//var_dump($product);

			if(empty($product)){
				die('ce produit est indisponible');
			}
		
			$panier->add($product[0]->id_article);
			die('le produit a bien été ajouté à votre panier <a href="javascript:history.back()">retour sur la page précédente</a>');
	

			}

			else {
				echo 'cet article est indisponible';
			}

			
			
		}else{
			die ("Vous n'avez pas selectionné de produit à ajouter au panier");
		}
	?>

	

	<a href="index.php">retour</a>
	<a href="panier.php">voir mon panier</a>
		</section>

</main>
    <footer>
        <?php include('includes/footer.php'); ?>
    </footer>
</body>
</html>
