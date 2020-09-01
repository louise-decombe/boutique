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
        $id_user= ($_SESSION['user']['id_user']);

        ?>

    </header>
    <main>

      <div class="boucle">

        <section id="container-register">
          <form method="post" action="action_contact_form.php" class="form" id="userForm">
              <div class="form-group">
                  <label>message</label>
                  <input type="textarea" class="form-control" name="message_utilisateur"/>
              </div>
                <input type="hidden" name="id_utilisateur" value="<?php echo $id_user; ?>"/>
              <input type="hidden" name="action_type" value="add"/>
              <input type="submit" class="form-control btn-default" name="submit" value="Envoyer"/>
          </form>
       </section>
  </div>
    </main>
    <footer>
        <?php include('includes/footer.php'); ?>
    </footer>
</body>
</html>
