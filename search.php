<?php $page_selected = 'search.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>boutique - homepage</title>
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
<main>
   <section id="container-search">
   <?php
   $articles = $db->query('SELECT * FROM article ORDER BY id_article DESC');
   if(isset($_GET['search']) AND !empty($_GET['search'])){
      $search = htmlspecialchars($_GET['search']);
      $articles = $db->query('SELECT * FROM article WHERE nom_article LIKE "%'.$search.'%" ORDER BY id_article DESC');
      if($articles == 0) {
         $articles = $bdd->query('SELECT * FROM article WHERE nom_article LIKE "%'.$search.'%" ORDER BY id DESC');

   }
   ?>

   <?php  var_dump($articles);

   if($articles > 0) { ?>

   <ul>
      <?php while($a = $articles->fetch_object()) { ?>
      <a href="img/<?= $a['img'] ?>"></a>
      <a href="item.php?id=<?php echo $a['id_article'] ;?>" > <li><?= $a['nom_article'] ?></li>
      <li><?= $a['prix_article'] ?> euros</li>

 <?php } ?>
 </ul>
<?php } else { ?>
Aucun résultat pour: <?= $search ?>...
<?php } ?>
   </section>
</main>
<footer>
   <?php
    include("includes/footer.php");
   ?>
</footer>
</body>
</html>
