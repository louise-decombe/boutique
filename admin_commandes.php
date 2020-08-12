<?php $page_selected = 'admin_commandes.php'; ?>

<?php
require("admin.class.php");
include("includes/header.php");
require("admin_nav.php")
?>
<!DOCTYPE html>
<html>
<head>
    <title>boutique - admin_commandes</title>
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

if($user->is_admin==0) {
   ?>
<div class="admin">


</div>
<?php }else{
  echo "vous n'avez pas le droit d'accéder à cette page, bien essayé ;)";
  echo "<a href='index.php'> Retour à l'accueil </a>";
} ?>
</main>
<footer>
  <?php include('includes/footer.php'); ?>

</footer>
</body>
</html>
