<?php $page_selected = 'admin_articles.php'; ?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<?php
include("includes/header.php");
require('admin_nav.php');

?>
<!DOCTYPE html>
<html>
<head>
    <title>boutique - admin_articles</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/0mKd0xT/icon-round-fanzine.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
          <link rel="stylesheet" href="css/admin-nad.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<main>

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
        <a href="action_newsletter.php?action_type=delete&id_newsletter=1 " onclick="return confirm('Êtes vous sure?');">X</a>
<?php var_dump($user['id_newsletter']) ?>

                        </td>
                    </tr>
                 <?php




                  }
              }
?>


</main>

</body>
</html>
