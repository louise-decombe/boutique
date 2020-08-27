<?php $page_selected = 'admin';?>

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

if ($user->is_admin==0) {
    ?>
<div class="admin">

<h2>Derniers messages</h2>
<?php
$users = $db->getRows('message_utilisateurs', array('order_by'=>'id_message_utilisateur DESC'));
if (!empty($users)) {
    $count = 0;
    foreach ($users as $user) {
        $count++; ?>
        <tr>
            <td><?php echo $user['message_utilisateur']; ?></td>
            <td><?php echo $user['date_registration']; ?></td>
            <td>
              <a href="admin_utilisateurs.php?id=<?php echo $user['id_utilisateur']; ?>" class="glyphicon glyphicon-edit"> Voir l'utilisateur</a>
                <a href="action_categorie.php?action_type=delete&id_categorie=<?php echo $user['id_message_utilisateur']; ?> " onclick="return confirm('Are you sure?');">X</a>
            </td>
        </tr>
<?php ; } ?>


<h2>Dernière commande </h2>




</div>

<?php }
} else {
        echo "vous n'avez pas le droit d'accéder à cette page, bien essayé ";
        echo "<a href='index.php'> Retour à l'accueil </a>";
    } ?>
</main>
</body>
</html>
