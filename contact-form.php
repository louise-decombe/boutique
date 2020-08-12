<?php $page_selected = 'contact-form.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <title>boutique - contact-form</title>
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
    <main>


      <section id="container-register">
         <form action="" method="post">
             <h3>NOUS CONTACTER</h3>
             <section id="box-form">
                     <input type="textarea" name="message" value="Votre message ici">
    </section>
             <button type="submit" name="submit">Envoyer le message </button>
         </form>
     </section>
<?php


if(isset($_POST['submit'])){
$id= 10;
$message = $_POST['message'];
$id_utilisateur = ($_SESSION['user']['id_user']);
$date = date('Y-m-d H:i:s');

$ins=array($id,$message,$id_utilisateur,$date);
$DB->insert('message_utilisateurs',$ins,null);


echo "le message a bien été posté";
}

 ?>

    </main>
    <footer>
        <?php include('includes/footer.php'); ?>
    </footer>
</body>
</html>
