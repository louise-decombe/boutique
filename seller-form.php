<?php $page_selected = 'seller-form.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <title>boutique - seller-form</title>
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
               <h3>Envoyer un message</h3>
              <center> <p>Dans ce formulaire vous proposez à la vente sur le site un article, n'hésitez pas à être exhaustif dans la description.</p>
            Nous vous répondrons rapidement pour savoir si nous vous acceptons comme distributeur.</center><br/>

           <section id="box-form">

  <label for="">Titre du fanzine</label>
                       <input type="text" name="titre_fanzine" placeholder="Titre du fanzine*">
  <label for="">Votre mail</label>
                        <input type="text" name="email_utilisateur" placeholder="Votre mail*">
  <label for="">Votre message</label>
                        <input type="textarea" name="message_vendeur" placeholder="Votre message ici*">
  <label for="">Description de l'article</label>
                        <input type="textarea" name="description_article_fanzine" placeholder="Description de l'article*">
     </section>
               <button type="submit" name="submit_message_vendeur">Envoyer le message</button>
           </form>
       </section>
</div>
<?php
if (isset($_POST['submit_message_vendeur']))
{
$titre_fanzine=$_POST['titre_fanzine'];
$email_utilisateur=$_POST['email_utilisateur'];
$message_vendeur=$_POST['message_vendeur'];
$description_article_fanzine=$_POST['description_article_fanzine'];
$date_message_vendeur= date("Y-m-d H:i:s");

$db->query("INSERT INTO `message_vendeur`( `email_utilisateur`, `message_vendeur`, `description_article_vendeur`, `titre_fanzine`, `date_message_vendeur`)
 VALUES ('$titre_fanzine','$email_utilisateur','$message_vendeur','$description_article_fanzine','$date_message_vendeur')");

    echo "Votre message a été envoyé, nous vous répondons rapidement !";
}
?>

    </main>
    <footer>
        <?php include('includes/footer.php'); ?>
    </footer>
</body>
</html>
