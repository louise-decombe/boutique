
<?php
require("admin.class.php");
include("includes/header.php");
require("admin_nav.php")
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
<div class="admin">

<a href="admin_utilisateurs.php?utilisateurs">Voir les utilisateurs</a><br/>
<a href="admin_utilisateurs.php?ajouter">ajouter un utilisateur</a><br/>
<?php

if(isset($_GET['utilisateurs'])){

echo "les utilisateurs";

}


if(isset($_GET['ajouter'])){

echo "ajouter un utilisateur";

}

 ?>

</div>

</main>
</body>
</html>