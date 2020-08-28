

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

    if (isset($_SESSION['user'])){

    $wish = $db->query("SELECT * FROM article INNER JOIN wishlist ON article.id_article = wishlist.id_article");

    foreach ($wish as $wishlist) { ?>
<table>
            <tr>
                <td><?php echo $wishlist->nom_article ?></td>
                <td><?php echo $wishlist->auteur_article ; ?></td>
                <td><?php echo $wishlist->citation_article ; ?></td>
                <td><?php echo $wishlist->prix_article ; ?> euros</td>
                <td>
<a href="item.php?id=<?php echo $wishlist->id_article ;?>">voir l'article</a>
<a href="action_wishlist.php?action_type=delete&id_article=<?php echo $wishlist->id_article ?> "
  onclick="return confirm('Are you sure?');">Supprimer</a>
                </td>
            </tr>
          </table>

<?php
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
