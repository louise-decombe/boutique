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

      <div class="row">
          <div class="panel panel-default user-add-edit">
              <div class="panel-heading">Envoyer un message pour être distributeur <a href="index.php" class="glyphicon glyphicon-arrow-left"></a></div>
              <div class="panel-body">
                  <form method="post" action="action_seller_form.php" class="form" id="userForm">
                      <div class="form-group">
                          <label>message</label>
                          <input type="textarea" class="form-control" name="message_vendeur"/>
                      </div>
                      <div class="form-group">
                          <label>Titre fanzine</label>
                          <input type="text" class="form-control" name="titre_fanzine"/>
                      </div>
                      <div class="form-group">
                          <label>description du fanzine</label>
                          <input type="textarea" class="form-control" name="description_article_vendeur"/>
                      </div>
                      <div class="form-group">
                          <label>Email</label>
                          <input type="text" class="form-control" name="email_utilisateur"/>
                      </div>
                      <input type="hidden" name="action_type" value="add"/>
                      <input type="submit" class="form-control btn-default" name="submit" value="Envoyer"/>
                  </form>
              </div>
          </div>
      </div>


    </main>
    <footer>
        <?php include('includes/footer.php'); ?>
    </footer>
</body>
</html>
