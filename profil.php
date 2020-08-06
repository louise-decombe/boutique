
<!DOCTYPE html>
<html>

<head>
    <title>boutique - profil</title>
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
        //$infos = $user->profile($_SESSION['user']['id_user']);
        //var_dump($infos);
        var_dump($_SESSION['user']);

        if (isset($_POST[""])) {
            $user->update_infos();
        }
        ?>
    </header>
    <main>
        <section id="container-profile">
            <article id="profile-infos">
                <h2 id="profile-title">Mes informations<h2>
                <p><?= $_SESSION['user']['firstname'] ?>&nbsp;<?= $_SESSION['user']['lastname']?></p>
                <address><p>Tel : <?= $_SESSION['user']['phone'] ?></p></address>
                
                <form id='onglet' method='POST'>
                    <input id="link-modif" name="modifier" value="modifier" type="submit"/>
                </form>
            </article>
            <?php if(isset($_POST['modifier'])){?>
                    <section>
                        <h3>MODIFIER MES INFOS</h3>
                        <form action="profil.php" method='POST'>
                            <section id="box-gender">
                                <label>CIVILITÉ</label>
                                <input type="radio" name="gender" id="female" value="Femme">
                                <label for="female">madame</label>
                                <input type="radio" name="gender" id="male" value="Homme">
                                <label for="male">monsieur</label>
                                <input type="radio" name="gender" id="no_gender" value="Non genré">
                                <label for="no_gender">non genré</label>
                            </section>
                            <input type="text" name="firstname" placeholder="prénom*">
                            <input type="text" name="lastname" placeholder="nom*">
                            <input type="tel" name="phone" placeholder="0123456789*">
                            <button type="submit" name="submit">MODIFIER</button>
                        </form>
                    </section>
               <?php } ?>
        </section>
    </main>
    <footer>
        <?php include('includes/footer.php'); ?>
    </footer>
</body>
</html>
