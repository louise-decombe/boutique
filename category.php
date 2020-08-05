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
    include("includes/header1.php");
   ?>
</header>
    <main>

      <?php
       $products = $DB->query('SELECT * FROM categorie');

       foreach ( $products as $product ):
  ?>

          <h4><?= $product->nom_categorie ?></h4>
          <a href="subcategory.php?id=<?= $product->id_categorie; ?>">Voir la catégorie</a>
      </div>
    <?php endforeach; ?>




    </main>
    <footer>
        <?php include('includes/footer.php'); ?>
    </footer>
</body>
</html>
