<?php $page_selected = 'admin_messages.php'; ?>
<?php
require("admin.class.php");
include("includes/header.php");
require("admin_nav.php")
?>
<!DOCTYPE html>
<html>
<head>
    <title>boutique - admin_messages</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/0mKd0xT/icon-round-fanzine.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
      <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

   <?php

 if($user->is_admin==0) {
    ?>
<main>
<div class="admin">

<a href="admin_messages.php?clients">Messages clients</a><br/>
<a href="admin_messages.php?vendeurs">Messages vendeurs</a><br/>
<?php

if(isset($_GET['clients'])){

 $products = $DB->query('SELECT * FROM message_utilisateurs'); ?>

  <?php foreach ( $products as $product ):
    echo  'reçu le  '.$product->date.'<br/>';

  echo  $product->message_utilisateur;
    // l boucle qui démarre permet d'afficher les messages ?>
      <a href="admin_utilisateurs.php?utilisateurs&modifier_compte=<?php echo $product->id_utilisateur;?>">
      Voir l'utilisateur  </a>
      </div>

  <?php endforeach ?>

<?php
}

if(isset($_GET['vendeurs']))
{

 $products = $DB->query('SELECT * FROM message_vendeur'); ?>

  <?php foreach ( $products as $product ):
    echo  'reçu le  '.$product->date.'<br/>';
    echo  'mail du vendeur  '.$product->email_utilisateur	.'<br/>';
    echo  'message  '.$product->message_utilisateur.'<br/>';
    echo  'description  '.$product->description_utilisateur.'<br/>';
    echo  'titre du zine  '.$product->titre_fanzine.'<br/>'.'<br />';
    // l boucle qui démarre permet d'afficher les messages ?>

      </div>

  <?php endforeach
;}
 ?>

</div>
<?php }else{
  echo "vous n'avez pas le droit d'accéder à cette page, bien essayé ;)";
  echo "<a href='index.php'> Retour à l'accueil </a>";
} ?>
</main>
</body>
</html>
