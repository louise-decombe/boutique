<?php $page_selected = 'admin_nav.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="css/admin.css">

    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="admin">

    <div class="container_nav_admin">
  <ul>
<div class="navbar">

  <div class="dropdown_nav">
    <button class="dropbtn">COMMANDES
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content-nav">
    <a href="admin_commandes.php">  Commandes </a>
    </div>
  </div>

  <div class="dropdown_nav">
    <button class="dropbtn">UTILISATEURS
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content-nav">
      <a href="admin_utilisateurs.php?utilisateurs"> Tout les utilisateurs</a>
      <a href="admin_utilisateurs.php?ajouter"> Ajouter un utilisateur</a>
    </div>
  </div>

  <div class="dropdown_nav">
    <button class="dropbtn">CATEGORIES
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content-nav">
      <a href="admin_categories.php?categories"> Catégories</a>
      <a href="admin_categories.php?sous_categorie"> Sous-catégories</a>
      <a href="admin_categories.php?ajouter"> Ajouter</a>
    </div>
  </div>

  <div class="dropdown_nav">
    <button class="dropbtn">MESSAGES
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content-nav">
      <a href="admin_messages.php?clients"> clients</a>
      <a href="admin_messages.php?vendeurs"> vendeurs</a>
    </div>
  </div>

  <div class="dropdown_nav">
    <button class="dropbtn">ARTICLES
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content-nav">
      <a href="admin_articles.php?articles">Tout les produits</a>
      <a href="admin_articles.php?ajouter">Ajouter un produit</a>
    </div>
  </div>

  <div class="dropdown_nav">
    <button class="dropbtn">NEWSLETTER
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content-nav">
      <a href="admin_newsletter.php">Voir les inscrits</a>
      <a href="envoi_newsletter.php?">Envoyer une newsletter</a>
    </div>
  </div>
</div>
</div>
</div>
  </body>
</html>
