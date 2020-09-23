<?php $page_selected = 'admin_messages'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>boutique - admin_messages</title>
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
    <?php include("includes/header.php"); ?>
</header>


   <?php

 if ($user->is_admin==0) {
     ?>
<main>
<section id="nav-admin-pages">
    <?php require("admin_nav.php"); ?>
</section>

<center>
<div class="container-valider">
<div class="valider">  <a href="admin_messages.php?clients">Messages clients</a><br/>

</div>
<div class="valider">
<a href="admin_messages.php?vendeurs">Messages vendeurs</a><br/>
</div>
</div>
</center>
<div class="container-treatment">
<div class="treatment-order">
<?php

if (isset($_GET['clients'])) { ?>
<h3>Message des utilisateurs<h3>
  <div class="rtable">

  <table>
      <tr>
          <th>Message</th>
          <th>Date</th>
          <th></th>
      </tr>

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
                  <a href="admin_messages.php?clients&delete=<?php echo $user['id_message_utilisateur']; ?> " onclick="return confirm('Êtes vous sure?');">X</a>
              </td>
          </tr>
       <?php

        }
    }
}
?>
</table>
</div>
</div>
</div>


<?php
     if (isset($_GET['vendeurs'])) { ?>
       <div class="container-treatment">
       <div class="treatment-order">
    <h3>Message des utilisateurs</h3>
<div class="rtable">

       <table>
           <tr>
               <th>Mail</th>
               <th>Message</th>

               <th>Description du fanzine</th>
               <th>Titre</th>
               <th>Date</th>
               <th></th>

           </tr>

      <?php   $users = $db->getRows('message_vendeur', array('order_by'=>'id_message_vendeur DESC'));
         if (!empty($users)) {
             $count = 0;
             foreach ($users as $user) {
                 $count++; ?>
          <tr>
            <td><?php echo $user['email_utilisateur']; ?></td>
            <td><?php echo $user['message_vendeur']; ?></td>
             <td><?php echo $user['description_article_vendeur']; ?></td>
              <td><?php echo $user['titre_fanzine']; ?></td>
              <td><?php echo $user['date_registration']; ?></td>
              <td>
                  <a href="action_seller_form.php?action_type=delete&id_message_vendeur=<?php echo $user['id_message_vendeur']; ?> " onclick="return confirm('Êtes vous sûr?');">X</a>
              </td>
          </tr>
       <?php
             }
         }
     } ?>
   </table>
      </div>
</div>
<?php
 } else {
     echo "vous n'avez pas le droit d'accéder à cette page, bien essayé ;)";
     echo "<a href='index.php'> Retour à l'accueil </a>";
 }   ?>
</main>
</body>
</html>
