<?php $page_selected = 'index'; ?>

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
<main>
    <section id="container-banner">
        <section id="banner">
            <a href="index1.php"><h1>SHOP FANZINE</h1></a>
        </section>
    </section>
  <div class="home">
  	<div class="row">
  		<div class="wrap">
  			<?php $products = $db->query('SELECT * FROM article'); ?>

  			<?php foreach ( $products as $product ):
  				// la boucle qui démarre permet d'afficher les articles ?>
  				<div class="box">
  					<div class="product full">
  						<a href="item.php">
  							<img src="img/<?= $product->id; ?>.jpg" width="10%">
  						</a>
              <a href="item.php?=<?php echo $product->id;?>">
  							<?= $product->nom_article; ?>
  						</a>
  						<div class="description">
  <a href="#">
  </a>
  							<a href="#" class="prix_article"><?= //number format permet de formater un nombre ici avec deux zéros
  							 number_format($product->prix_article,2,',',' '); ?> €</a>
  						</div>
<?php if(isset($_SESSION['user'])){ ?>
              <a class="" href="addwishlist.php?id=<?= $product->id; ?>">
wishlist </a>
  						<a class="add addpanier" href="addpanier.php?id=<?= $product->id; ?>">
  							add
  						</a>
    <?php }else{?>
<a href="connexion.php">  wishlist </a>
      <a class="" href="connexion.php">
        add
      </a>  					</div>
  				</div>
  			<?php } endforeach ?>
  		</div>
  	</div>
  </div>
</main>
<footer>
    <?php
    include("includes/footer.php") ?>
</footer>
</body>
</html>
