<?php $page_selected = 'envoi_newsletter'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>boutique - envoi-newsletter</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/0mKd0xT/icon-round-fanzine.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style-admin-general.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</head>
<body>
<header>
<?php
    include("includes/header.php");

      if (isset($_SESSION['user'])) {
    if($_SESSION['user']['is_admin'] == 1)
         {
?>
</header>
<main>
<section id="nav-admin-pages">
    <?php require("admin_nav.php"); ?>
</section>

<section id="container-register">
  <form method="post" action="action_categorie.php" class="" id="userForm">
    <h3>ENVOYER UNE NEWSLETTER</h3>
    <section id="box-form">
      <section id="box-password">

        <?php

         ?>

        <label>Envoi d'une newsletter</label>
<label for="">@ tout les clients</label>

        <label for="">Message</label>
        <input type="text" class="" name="nom_categorie"/>
    <input type="hidden" name="action_type" value="add"/>
    <input type="submit" class="bouton-admin" name="submit" value="Envoyer"/>
</form>
</section>
</section>
</section>

</main>
<?php }
    } ?>
</body>
</html>
