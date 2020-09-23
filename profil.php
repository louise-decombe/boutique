<?php $page_selected = 'profil'; ?>
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
    <link rel="stylesheet" type="text/css" href="css/style-profile.css">
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</head>
<body>
    <header>
        <?php
        include("includes/header.php");

        //var_dump($infos);
        //var_dump($_SESSION['user']);

        //$infos = $user->profile($_SESSION['user']['id_user']);

        if (isset($_POST["modify_infos"])) {
            $id_user= ($_SESSION['user']['id_user']);
            $user->modify_infos($id_user,$_POST['gender'],$_POST['firstname'],$_POST['lastname'],$_POST['phone']);
            $refresh = $user->refresh($id_user);
            //var_dump($refresh);
        }
        if (isset($_POST["modify_password"])) {
            $id_user= ($_SESSION['user']['id_user']);
            $user->modify_password($id_user, $_POST['new_password'],$_POST['check_password']);
        }
        /*if (isset($_POST["close_window"])) {
            $id_user= ($_SESSION['user']['id_user']);
            $user->modify_password($id_user, $_POST['new_password'],$_POST['check_password']);
        }*/
        ?>
    </header>
    <main>
        <section id="container-profile">
            <nav>
                <li><a id="selected_page" href="profil.php"> <i class="far fa-user-circle"></i>  &nbsp; MES INFORMATIONS</a></li>
                <li><a href="order_track.php"> <i class="fas fa-shopping-bag"></i> MES COMMANDES</a></li>
                <li><a href="wishlist.php"> <i class="far fa-heart"></i> WHISHLIST</a></li>
                <li><a href="contact-form.php"> <i class="far fa-envelope"></i> NOUS CONTACTER</a></li>
                <li>
                    <form action="index.php" method="post">
                        <input id="deco-profile" name="deco" value="SE DECONNECTER" type="submit"/>
                    </form>
                </li>
            </nav>

            <article id="profile-infos">
                <h2>Mes informations</h2>
                    <p><?= $_SESSION['user']['firstname'] ?>&nbsp;<?= $_SESSION['user']['lastname']?></p>
                    <address>Tel : <?= $_SESSION['user']['phone'] ?></address>

                    <form class='onglet' method='POST'>
                        <input id="link-modif" name="modifier" value="modifier" type="submit"/>
                    </form>

                    <form class='onglet' method='POST'>
                        <input id="link-modif" name="change_password" value="changer le mot de passe" type="submit"/>
                    </form>
            </article>

            <?php if(isset($_POST['modifier'])){?>
                    <section class="modify">
                        <a href="profil.php">x</a>
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
                            <section>
                                <input type="text" name="firstname" placeholder="<?=$_SESSION['user']['firstname']?>">
                                <input type="text" name="lastname" placeholder="<?=$_SESSION['user']['lastname']?>">
                            </section>
                            <input type="tel" name="phone" placeholder="<?=$_SESSION['user']['phone']?>">
                            <button type="submit" name="modify_infos">ENREGISTRER MES NOUVELLES INFORMATIONS</button>
                        </form>
                    </section>
               <?php }

                if(isset($_POST['change_password'])){?>
                <section class="modify">
                    <a href="profil.php">x</a>
                    <h3>CHANGER LE MOT DE PASSE</h3>
                    <form action="profil.php" method='POST'>
                        <section>
                            <input type="password" name="new_password" placeholder="nouveau password">
                            <input type="password" name="check_password" placeholder="confirmer le password">
                        </section>
                        <button type="submit" name="modify_password">ENREGISTRER LE NOUVEAU MOT DE PASSE</button>
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
