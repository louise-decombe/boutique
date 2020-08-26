<?php $page_selected = 'addwhislist.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>boutique - addwhishlist</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/0mKd0xT/icon-round-fanzine.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<header>
    <?php
    include("includes/header.php");
   ?>
</header>


<?php

if (isset($_GET['ajouter_wishlist']))
{
  $id_utilisateur=$_SESSION['id_utilisateur'];
  $id_article=$_GET['id_article'];

    $ins = array(
      $id_utilisateur,
      $id_article,

    );
    $db->insert('wishlist', $ins, null);

    echo "l'article a bien été ajouté à votre wishlist.";





?>

<a href="wishlist.php">voir ma wishlist</a> }
