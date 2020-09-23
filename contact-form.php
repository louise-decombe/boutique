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
    <link rel="stylesheet" href="css/admin.css">
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</head>

<body>
    <header>
        <?php
        include("includes/header.php");
        $id_user= ($_SESSION['user']['id_user']);
        ?>

    </header>
    <main>
      <?php if (!empty($_SESSION['statusMsg'])) {
          echo '<p>'.$_SESSION['statusMsg'].'</p>';
          unset($_SESSION['statusMsg']); }
       ?>
      <section id="container-register">
        <form method="post" action="action_contact_form.php" class="form" id="userForm">
          <h3>Envoyer un message </h3>
          <p>Contactez notre service client et nous vous répondrons dès que possible</p><br/>
          <section id="box-form">
            <section id="box-password">
                  <input type="textarea" name="message_utilisateur"/>
                <input type="hidden" name="id_utilisateur" value="<?php echo $id_user; ?>"/>
              <input type="hidden" name="action_type" value="add"/>
              <input type="submit" class="submit-bouton" name="submit" value="Envoyer"/>
          </form>

       </section><br/>
       <a href="profil.php">retour au profil</a>

     </section>
     </section>
    </main>
    <footer>
        <?php include('includes/footer.php'); ?>
    </footer>
</body>
</html>
