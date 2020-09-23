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

<div id="container-nav">
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#">COMMANDES</a>
            <!-- First Tier Drop Down -->
            <ul>
                <li><a href="admin-orders.php">tableau de bord</a></li>
            </ul>
            </li>
            <li><a href="#">UTILISATEURS</a>
            <!-- First Tier Drop Down -->
            <ul>
                <li><a  href="admin_utilisateurs.php?utilisateurs">membres</a></li>
                <li><a href="admin_utilisateurs.php?ajouter">ajout utilisateur</a></li>
            	<!-- Second Tier Drop Down -->
            </ul>
            </li>
            <li><a href="#">CATÉGORIES</a>
            <!-- First Tier Drop Down -->
            <ul>
                <li><a href="admin_categories.php?categories">catégories</a></li>
                <li><a href="admin_categories.php?sous_categorie">sous-catégories</a></li>
                <li><a href="admin_categories.php?ajouter">ajout catégorie</a></li>
            	<!-- Second Tier Drop Down -->
            </ul>
            </li>
            <li><a href="#">ARTICLES</a>
            <!-- First Tier Drop Down -->
            <ul>
                <li><a href="admin_articles.php?articles">tous les articles</a></li>
                <li><a href="admin_articles.php?ajouter">ajout article</a></li>
            	<!-- Second Tier Drop Down -->
            </ul>
            </li>
            <li><a href="#">STOCK</a>
            <!-- First Tier Drop Down -->
            <ul>
                <li><a href="admin-stock.php">stocks articles</a></li>
            	<!-- Second Tier Drop Down -->
            </ul>
            </li>
            <li><a href="#">MESSAGES</a>
            <!-- First Tier Drop Down -->
            <ul>
                <li><a href="admin_messages.php?clients">clients</a></li>
                <li><a href="admin_messages.php?vendeurs">vendeurs</a></li>

            	<!-- Second Tier Drop Down -->
            </ul>
            </li>
            <li><a href="#">NEWSLETTER</a>
            <!-- First Tier Drop Down -->
            <ul>
                <li><a href="admin_newsletter.php">voir les inscrits</a></li>
                <li><a href="envoi_newsletter.php?">Envoyer une newsletter</a></li>

            	<!-- Second Tier Drop Down -->
            </ul>
            </li>
            <li><a href="#">ACTUS</a>
            <!-- First Tier Drop Down -->
            <ul>
                <li><a href="admin-form-news.php">Editer</a></li>
            	<!-- Second Tier Drop Down -->
            </ul>
            </li>
        </ul>
    </nav>
</div>
