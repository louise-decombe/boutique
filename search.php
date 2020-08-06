


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


<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=boutique;charset=utf8','root','');

$articles = $bdd->query('SELECT * FROM article ORDER BY id DESC');
if(isset($_GET['search']) AND !empty($_GET['search'])) {
 $search = htmlspecialchars($_GET['search']);
 $articles = $bdd->query('SELECT * FROM article WHERE name LIKE "%'.$search.'%" ORDER BY id DESC');
 if($articles->rowCount() == 0) {
    $articles = $bdd->query('SELECT * FROM article WHERE CONCAT(name, description_article) LIKE "%'.$search.'%" ORDER BY id DESC');
 }
}
?>

<?php if($articles->rowCount() > 0) { ?>
 <ul>
 <?php while($a = $articles->fetch()) { ?>
   <a href="img/<?= $a['img'] ?>"/>

    <a href="item.php?id=<?php echo $a['id'] ;?>" > <li><?= $a['name'] ?></li>
    <li><?= $a['price'] ?> euros</li>

 <?php } ?>
 </ul>
<?php } else { ?>
Aucun résultat pour: <?= $search ?>...
<?php } ?>
