<?php $page_selected = 'admin';?>

<!DOCTYPE html>
<html>

<head>
    <title>boutique - admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/0mKd0xT/icon-round-fanzine.png">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <header>
        <?php include("includes/header.php"); ?>
    </header>
    <main>
    </main>
    <footer>
        <?php include("includes/footer.php") ?>
    </footer>
</body>

</html>


<?php
include("includes/header.php");
require("admin_nav.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>boutique - homepage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/0mKd0xT/icon-round-fanzine.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
          <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<header>

</header>
<main>
  <?php

if($users->is_admin==1) {
   ?>
<div class="admin">



<h2>Derniers messages</h2>


<h2>Dernière commande</h2>




</div>

<?php }else{
  echo "vous n'avez pas le droit d'accéder à cette page, bien essayé ;)";
  echo "<a href='index.php'> Retour à l'accueil </a>";
} ?>
</main>
</body>
</html>
