<?php $page_selected = 'panier'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>boutique - récapitulatif panier</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/0mKd0xT/icon-round-fanzine.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/style-panier.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</head>
<body>
<header>
    <?php
	include("includes/header.php");
  if (isset($_SESSION['user'])) {


	require 'class/order.php';
	$order = new Order($db);
   ?>
</header>
<main>
	<section id="container-panier">
		<nav>
	   		<ul>
	   			<li><b>1 - mon panier</b></li>
				<li> 2 - livraison & paiement </li>
				<li> 3 - confirmation </li>
	   		</ul>
		</nav>
		<section id="sub-panier">
			<form method="post" action="panier.php">
				<table>
					<thead>
						<tr>
			  				<th>article</td>
			  				<th>titre</td>
			  				<th>prix unité</td>
							<th>quantité</td>
							<th></td>
							<th>prix total</td>
							<th id="supp">SUPP.</td>
			    		</tr>
					</thead>

					<?php
					// récupération des informations de session pour le panier avec array_keys qui sont les clés du tableau
					$ids = array_keys($_SESSION['panier']);
					//si le tableau est vide les infos envoyées sont vides
					if(empty($ids)){
						$products = array();
					}else{
						$products = $db->query('SELECT * FROM article AS A INNER JOIN image_article as I ON A.id_article = I.id_article WHERE A.id_article IN ('.implode(',',$ids).')');
						//var_dump($products);
					}
					foreach($products as $product):
					?>

					<tbody>
            			<tr>
              				<td><img src="<?= $product->chemin;?>" height="100"></td>
			  				<td><?= $product->nom_article; ?></td>
			  				<td><?= $formatter->formatCurrency($product->prix_article,'EUR'), PHP_EOL;?></td>
							<td><input type="text" name="panier[quantity][<?= $product->id_article; ?>]" value="<?= $_SESSION['panier'][$product->id_article]; ?>"></td>
							<td><input id="recalc" type="submit" value="Recalculer"></td>
							<td>
								<?php
									$sub_total = $panier->sub_total($product->prix_article, $_SESSION['panier'][$product->id_article]);
							        echo $formatter->formatCurrency($sub_total,'EUR'), PHP_EOL;
								?>
							</td>
							<td><a href="panier.php?delPanier=<?= $product->id_article; ?>" class="del">X</a></td>
			  			</tr>
					</tbody>

					<?php endforeach; ?>
				</table>
			</form>
			<section id="recap-order">
				<article>
					<h1>Récapitulatif ( <?= $panier->count(); ?> article(s)) </h1>
					<?php if($panier->count() == 0){
						header('location:index1.php');
					}
				    ?>
						<p>sous-total
						<?= number_format($panier->total(),2,',',' '); ?>€
						</p>
					 	<p id="delivery">estimation livraison standard <?php $delivery = $order->default_delivery(); ?> € <p>
						<h2 id="total-order">TOTAL
							<?php
							echo $formatter->formatCurrency($order->estimation($panier->total(), $delivery[0]['prix_livraison']), 'EUR'), PHP_EOL;
							?>
						</h2>
				</article>
				<a href="order.php">Commander</a>
				<aside>
					<h3> PAIEMENT SÉCURISÉ & RETOURS GRATUITS </h3>

					<a id="contact-client" href="tel:0800 00 00 00">SERVICE CLIENT : 0800 00 00 00 (N° GRATUIT)</a>

					<p>Le service client est joignable du Lundi au Vendredi de 9h à 19h et le Samedi de 10h à 17h ou via notre rubrique contact.
						En raison des circonstances exceptionnelles, les délais de réponse du service client peuvent être impactés. Nous en sommes désolés et vous remercions pour votre patience.
						L’équipe High & Craft !
					</p>
				</aside>
			</section>
		</section>
	</section>
</main>
    <footer>
        <?php

}else{
  echo "vous n'avez pas le droit d'accéder à cette page";
}        include('includes/footer.php'); ?>
    </footer>
</body>
</html>
