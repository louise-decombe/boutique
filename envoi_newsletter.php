<?php $page_selected = 'envoi_newsletter.php'; ?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<?php
include("includes/header.php");
require('admin_nav.php');

?>
<!DOCTYPE html>
<html>
<head>
    <title>boutique - admin_categories</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/0mKd0xT/icon-round-fanzine.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
          <link rel="stylesheet" href="css/admin.css">
          <link rel="stylesheet" href="css/admin-nad.css">

    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<main>
<section id="container-register">
  <form method="post" action="action_categorie.php" class="" id="userForm">
    <h3>ENVOYER UNE NEWSLETTER</h3>
    <section id="box-form">
      <section id="box-password">

        <?php

         ?>

        <label>Envoi d'une newsletter</label>
<label for="">Mail</label>
        <input type="text" class="" name="email_utilisateur" value="<?php

$mail= $db->query("SELECT * FROM newsletter");
foreach ($mail as $news) {
echo $news['email_utilisateur'];
}         ?>"/>
        <label for="">Message</label>
        <input type="text" class="" name="nom_categorie"/>
    <input type="hidden" name="action_type" value="add"/>
    <input type="submit" class="" name="submit" value="Envoyer"/>
</form>
</section>
</section>
</section>

</main>
</body>
</html>
