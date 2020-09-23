<?php $page_selected = 'admin_newsletter'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>boutique - admin_newsletter</title>
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
<?php
include("includes/header.php");
?>
</header>
<main>
    <section id="nav-admin-pages">
        <?php require("admin_nav.php"); ?>
    </section>

        <div class="container-treatment">
        <div class="treatment-order">
          <?php
      $users = $db->getRows('newsletter', array('order_by'=>'id_newsletter DESC'));
              if (!empty($users)) {
                  $count = 0;
                  foreach ($users as $user) {
                      $count++; ?>
                    <tr>
                        <td><?php echo $user['email_utilisateur']; ?></td>
                        <td>

      <a href="action_newsletter.php?action_type=delete&id_newsletter=<?php echo $user['id_newsletter']; ?> " onclick="return confirm('Voulez vous vraiment supprimer cette entrée?');">X</a>


                        </td>
                    </tr>
                 <?php




                  }
              }
?>
      </div>
    </div>


</main>

</body>
</html>
