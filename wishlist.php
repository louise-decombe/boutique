

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
    <link rel="stylesheet" type="text/css" href="css/style-profile.css">

</head>
<body>
<header>
    <?php
    include("includes/header.php");
   ?>
</header>


  <section id="container-profile">
      <nav>
          <li><a id="selected_page" href="profil.php"> <i class="far fa-user-circle"></i>  &nbsp; MES INFORMATIONS</a></li>
          <li><a href="order.php"> <i class="fas fa-shopping-bag"></i> MES COMMANDES</a></li>
          <li><a href="returns.php"> <i class="fas fa-truck"></i> MES LIVRAISONS</a></li>
          <li><a href="wallet.php"> <i class="far fa-credit-card"></i> MES MODES DE PAIEMENT</a></li>
          <li><a href="wishlist.php"> <i class="far fa-heart"></i> WHISHLIST</a></li>
          <li><a href="contact-form.php"> <i class="far fa-envelope"></i> NOUS CONTACTER</a></li>
          <li>
              <form action="index.php" method="post">
                  <input id="deco" name="deco" value="SE DECONNECTER" type="submit"/>
              </form>
          </li>
      </nav>

<section id="profile-infos">

	<form method="post" action="wishlist.php">
      <h2>Wish List</h2>
      <p>Retouvez ici les articles que vous aimez</p>
      </div>
    </div>
	<div class="table">
		<div class="wrap">

			<?php

    if (isset($_SESSION['user'])){

    $wish = $db->query("SELECT * FROM article INNER JOIN wishlist ON article.id_article = wishlist.id_article INNER JOIN image_article ON image_article.id_article = article.id_article");

    foreach ($wish as $wishlist) {

       ?>
<table>

  <section>
    <tr>
      <td><img src="<?php echo $wishlist->chemin;
    ?>" alt="IMAGE" width="20%" >
        <?php echo $wishlist->nom_article ?></td>

        <td><?php echo $wishlist->nom_article ?></td>
        <td><?php echo $wishlist->auteur_article ; ?></td>
        <td><?php echo $wishlist->citation_article ; ?></td>
        <td><?php echo $wishlist->prix_article ; ?> euros</td>
        <td>
<a href="item.php?id=<?php echo $wishlist->id_article ;?>">voir l'article</a>
<a class="add addpanier" id="add-basket" href="addpanier.php?id=<? echo $wishlist->id_article ?>">
ajouter au panier
</a>
<a href="action_wishlist.php?action_type=delete&id_article=<?php echo $wishlist->id_article; ?> "
onclick="return confirm('Etes vous sûr?');">Supprimer</a>
        </td>
    </tr>
  </section>

          </table>

<?php
}
		 ?>

	</div>
	</form>
	<a href="profil.php">Retour au profil</a>
</div>
</section>

</section>

<?php }else{

echo "vous ne pouvez pas accéder à cette page sans vous <a href='connexion.php'> connecter </a> ou bien vous
<a href='subscription.php'> inscrire </a>";

} ?>
