<?php
ob_start();
$page_selected = 'admin-form-news';?>
<!DOCTYPE html>
<html>
<head>
    <title>boutique - admin nad</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/0mKd0xT/icon-round-fanzine.png">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style-admin-general.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</head>
<?php  if (isset($_SESSION['user'])) {
      if ($user->is_admin == 1) { ?>
<body>
    <header>
        <?php include("includes/header.php");
        require 'class/admin-options.php';
        $form_index = new Admin_options($db);
        if(isset($_POST['add_news']) && isset($_POST['index_news'])){
            $news = $form_index->index_news($_POST['index_news']);
        }
        ?>
    </header>
    <main>
        <section id="nav-admin-pages">
        <?php require("admin_nav.php"); ?>
        </section>
        <section id=container-treatment>
            <article id="profile-infos">
                <h1>TABLEAU DE BORD INDEX - NEWS</h1>
                    <form action="" method='POST' id="news-index-form">
                        <input type="text" name="index_news" placeholder="actualité du site*" maxlenght="200">
                        <button type="submit" name="add_news">AFFICHER SUR LE SITE</button>
                    </form>
            </article>
        </section>
    </main>
    <footer>
        <?php include("includes/footer.php"); ?>
    </footer>
</body>
</html>
<?php
ob_end_flush();
}
}
else {
  echo "vous n'avez pas accès à cette page";
}
?>
