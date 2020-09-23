
<?php $page_selected = 'addpanier'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>boutique - addpanier</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/0mKd0xT/icon-round-fanzine.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>

    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/style-item.css">
</head>
<body>
	<header>
    	<?php
    		include("includes/header.php");
   		?>
	</header>
	<main>
		<section id="container-item">

	<?php

		$json = array('error'=>true);
		if(isset($_GET['id'])){

			$id_test = $_GET['id'];

			// check dans la table stock pour vérifier la disponibilité du produit
			$check = $panier->check_stock($id_test);
			//var_dump($check[0]->nb_articles_stock);

			if  ($check[0]->nb_articles_stock > 0 ){

			$product = $db->query('SELECT id_article FROM article WHERE id_article = :id', array('id'=> $_GET['id']));
			//var_dump($product);

			if(empty($product)){
				$json['message'] = 'cet article est indisponible';
			}

			$panier->add($product[0]->id_article);
			$json['error'] = false;
			$json['total'] = $panier->total();
			$json['total'] = $panier->count();
			$json['message'] = 'le produit a bien été ajouté à votre panier';


			}

			else {
				$json['message'] = 'cet article est indisponible';
			}

		}else{
			$json['message'] =  ("Vous n'avez pas selectionné de produit à ajouter au panier");
		}
		echo json_encode($json);
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
