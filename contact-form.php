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

      <div class="boucle">

        <section id="container-register">
           <form action="" method="post">
               <h3>Contacter notre équipe</h3>

           <section id="box-form">


  <label for="">Votre message</label>
                        <input type="textarea" name="message_utilisateur" placeholder="Votre message ici*">

     </section>
               <button type="submit" name="submit_message_utilisateur">Envoyer</button>
           </form>
       </section>
  </div>
  <?php
  if (isset($_POST['submit_message_utilisateur']))
  {

$id_utilisateur=$_SESSION['id_user'];
$message_utilisateur=$_POST['message_utilisateur'];
$date_message=date("Y-m-d H:i:s");

  $db->query("INSERT INTO `message_utilisateurs`( `message_utilisateur`, `id_utilisateur`, `date_message`)
  VALUES ('$message_utilisateur','$id_utilisateur','$date_message')");

    echo "Votre message a été envoyé, nous vous répondons rapidement !";
  }
  ?>

    </main>
    <footer>
        <?php include('includes/footer.php'); ?>
    </footer>
</body>
</html>
