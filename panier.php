
<!DOCTYPE html>
<html>
<head>
    <title>boutique - homepage</title>
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

<?php if(isset($_SESSION['user'])){ ?>
<div class="checkout">
	<div class="title">
		<div class="wrap">
		<h2 class="first">Panier</h2>
		</div>
	</div>
	<form method="post" action="panier.php">
	<div class="table">
		<div class="wrap">

			<div class="rowtitle">
				<span class="name">Product name</span>
				<span class="price">Price</span>
				<span class="quantity">Quantity</span>
				<span class="action">Actions</span>
			</div>

			<?php
			// récupération des informations de session pour le panier avec array_keys qui sont les clés du tableau
			$ids = array_keys($_SESSION['panier']);
//si le tableau est vide les infos envoyées sont vides
			if(empty($ids)){
				$products = array();
			}else{
				$products = $DB->query('SELECT * FROM article WHERE id IN ('.implode(',',$ids).')');
			}
			foreach($products as $product):
			?>
			<div class="row">
				<a href="#" class="img"> <img src="img/<?= $product->id; ?>.jpg" height="53"></a>
				<span class="name"><?= $product->name; ?></span>
				<span class="price"><?= number_format($product->price,2,',',' '); ?> €</span>
				<span class="quantity"><input type="text" name="panier[quantity][<?= $product->id; ?>]" value="<?= $_SESSION['panier'][$product->id]; ?>"></span>
				<span class="subtotal"><?= number_format($product->price,2,',',' '); ?> €</span>
				<span class="action">
					<a href="panier.php?delPanier=<?= $product->id; ?>" class="del"> supprimer du panier</a>
				</span>
			</div>
			<?php endforeach; ?>
			<div class="rowtotal">
				Grand Total : <span class="total"><?= number_format($panier->total(),2,',',' '); ?> € </span>
			</div>
			<input type="submit" value="Recalculer">
		</div>
	</div>
	</form>
	<a href="order.php">Commander</a>
</div>
<?php }else{

echo "vous ne pouvez pas accéder à cette page sans vous <a href='connexion.php'> connecter </a> ou bien vous
<a href='subscription.php'> inscrire </a>";
}
 ?>
