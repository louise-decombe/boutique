<?php $page_selected = 'seller-form'; ?>

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
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</head>

<body>
    <header>
        <?php
        include("includes/header.php");
        ?>
    </header>
    <main>
      <section id="container-register">
        <form method="post" action="action_seller_form.php" class="form" id="userForm">
          <h3>Envoyer un message pour être distributeur</h3>
          <section id="box-form">
            <section id="box-password">
                          <label>message</label>
                          <input type="textarea" class="" name="message_vendeur"/>
                          <label>Titre fanzine</label>
                          <input type="text" class="" name="titre_fanzine"/>
                          <label>description du fanzine</label>
                          <input type="textarea" class="" name="description_article_vendeur"/>
                          <label>Email</label>
                          <input type="text" class="" name="email_utilisateur"/>
                      <input type="hidden" name="action_type" value="add"/>
                      <input type="submit" class="" name="submit" value="Envoyer"/>
                  </form>
</section>
</section>
</section>

    </main>
    <footer>
        <?php include('includes/footer.php'); ?>
    </footer>
</body>
</html>
