<?php 
ob_start();
$page_selected = 'connexion.php'; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>boutique - connexion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/0mKd0xT/icon-round-fanzine.png">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<header>
    <?php
    include("includes/header.php"); 
    ?>
</header>
<main>
    <?php
    if (isset($_POST['submit'])) {
        $user->connect(
            $_POST['email'],
            $_POST['password']
        );
    }
    ?>
    <section id="container-connect">
        <form action="connexion.php" method="post">
            <section id ="new-user">
                <h3>DÉJÀ CLIENT ?</h3>
                <a href="inscription.php">NOUVEAU CLIENT</a>
            </section>
            <h4>connectez-vous pour accèder à votre compte</h4>
            <section id="box-connect">
                <input name="email" type="text" placeholder="email@email.com*">
                <input name="password" type="password" placeholder="Mot de passe*">
                <a href="lost-password.php">mot de passe oublié ?</a>
            </section>
            <button type="submit" name="submit">ME CONNECTER</button>
            <a id="linkconnect" href="inscription.php">Pas encore inscrit ? Rejoins-nous maintenant !</a>
        </form>
    </section>
</main>
<footer>
    <?php
    include("includes/footer.php") ?>
</footer>
</body>
</html>
<?php
ob_end_flush();
?>