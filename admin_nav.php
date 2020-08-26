<?php $page_selected = 'admin_nav.php'; ?>

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
  <center><h1>Admin</h1></center>
  <ul>

    <li><a href="admin_commandes.php">  Commandes </a></</li>


    <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn" href="admin_messages">Utilisateurs</a>
      <div class="dropdown-content">
        <a href="admin_utilisateurs.php?utilisateurs"> Tout les utilisateurs</a>
        <a href="admin_utilisateurs.php?ajouter"> Ajouter un utilisateur</a>
      </div>
    </li>

    <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn" href="admin_articles.php">Articles</a>
      <div class="dropdown-content">
        <a href="admin_articles.php?articles">Tout les produits</a>
        <a href="admin_articles.php?ajouter">Ajouter un produit</a>
      </div>
    </li>

    <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn" href="admin_messages">Messages</a>
      <div class="dropdown-content">
        <a href="admin_messages.php?clients"> clients</a>
        <a href="admin_messages.php?vendeurs"> vendeurs</a>
      </div>
    </li>

    <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn" href="admin_messages">Catégories</a>
      <div class="dropdown-content">
        <a href="admin_categories.php?categories"> Catégories</a>
        <a href="admin_categories.php?sous_categorie"> Sous-catégories</a>
        <a href="admin_categories.php?ajouter"> Ajouter</a>
      </div>
    </li>
  </ul>
  </div>
</div>

  </body>
</html>
