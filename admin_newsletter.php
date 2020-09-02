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
<?php
  $news = $db->query("SELECT * FROM newsletter ");
    foreach ($news as $newsletter) {
        ?>
<table>
          <tr>
              <td><?php echo $newsletter->email_utilisateur; ?></td>
              <td>
<a href="admin_newsletter?supprimer">Supprimer </a>
              </td>
          </tr>
          <?php
    } ?>
</table>
<?php if (isset($_GET['supprimer'])) {
    } ?>

</main>

</body>
</html>
