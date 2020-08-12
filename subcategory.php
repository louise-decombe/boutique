<?php $page_selected = 'subcategory.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>boutique - sous categories</title>
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

      <?php

      if(isset($_GET['id'])){
$id = $_GET['id'];
       $products = $db->query("SELECT * FROM sous_categorie WHERE id_sous_categorie = '$id' ");

       foreach ( $products as $product ):
  ?>

          <h4><?= $product->nom_sous_categorie ?></h4>
          <a href="item.php?id=<?= $product->id_sous_categorie; ?>">Voir les articles</a>
      </div>
    <?php endforeach; } ?>

<br/><a href="category.php">Retour aux catégories</a>


    </main>
    <footer>
        <?php include('includes/footer.php'); ?>
    </footer>
</body>
</html>
