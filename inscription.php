<?php 
ob_start();
$page_selected = 'inscription'; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>boutique - inscription</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/0mKd0xT/icon-round-fanzine.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</head>
<body>
<header>
    <?php
    include("includes/header.php") ?>
</header>
<main>
    <?php
    if (isset($_POST['submit'])) {
        $user->register(
            $_POST['firstname'],
            $_POST['lastname'],
            $_POST['gender'],
            $_POST['phone'],
            $_POST['email'],
            $_POST['password'],
            $_POST['conf_password']
        );
    }

    if (isset($_POST['submit']) && isset($_POST['newsletter'])){
        $user->newsletter($_POST['email']);
    }

    ?>
     <section id="container-register">
        <form action="inscription.php" method="post">
            <h3>CRÉER MON COMPTE</h3>
            <section id="box-form">

                    <section id="box-gender">
                        <label>CIVILITÉ</label>
                        <input type="radio" name="gender" id="female" value="Femme">
                        <label for="gender">madame</label>
                        <input type="radio" name="gender" id="male" value="Homme">
                        <label for="gender">monsieur</label>
                        <input type="radio" name="gender" id="no_gender" value="Non genré">
                        <label for="gender">non genré</label>
                    </section>


                    <input type="text" name="firstname" placeholder="prénom*">

                    <input type="text" name="lastname" placeholder="nom*">

                    <input type="text" name="email" placeholder="email@email.com*">

                    <input type="tel" name="phone" placeholder="0123456789*">

                    <section id="box-password">
                        <label for="password">password</label>
                        <input type="password" name="password" placeholder="mot de passe*">
                        <label for="conf_password">confirmation password</label>
                        <input type="password" name="conf_password" placeholder="confirmer le mot de passe*">
                    </section>

            </section>
            <section id="box-newsletter">
                <input type="checkbox" name="newsletter" value="newsletter">
                <label for="newsletter">je souhaite recevoir votre actualité en avant-première. </label>
            </section>
            <button type="submit" name="submit">Enregistrer vos informations</button>
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
