<?php $page_selected = 'admin_utilisateurs'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>boutique - admin - utilisateurs</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/0mKd0xT/icon-round-fanzine.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style-admin-general.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
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
    <section>
    
        <a href="admin_utilisateurs.php?utilisateurs">Voir les utilisateurs</a><br/>
        <a href="admin_utilisateurs.php?ajouter">ajouter un utilisateur</a><br/>

    <?php
    if (isset($_GET['utilisateurs'])) {
    ?>
    <div class="container-treatment">
    <div class="treatment-order">
    <?php
    if (!empty($_SESSION['statusMsg'])) {
        echo '<p>'.$_SESSION['statusMsg'].'</p>';
        unset($_SESSION['statusMsg']);
    } ?>

            UTILISATEURS
            <table>
                <tr>
                    <th>#</th>
                    <th >Nom</th>
                    <th>Prénom</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Is admin</th>
                    <th></th>
                </tr>
                <?php

                $users = $db->getRows('utilisateurs', array('order_by'=>'id_utilisateur DESC'));
    if (!empty($users)) {
        $count = 0;
        foreach ($users as $user) {
            $count++; ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $user['nom']; ?></td>
                    <td><?php echo $user['prenom']; ?></td>
                    <td><?php echo $user['phone']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['gender']; ?></td>
                    <td><?php

$is_admin=$user['is_admin'];
            if ($is_admin=1) {
                echo "oui";
            } else {
                echo "non";
            } ?></td>
          </div>
          </div>
                    <td>
                        <a href="admin_utilisateurs.php?id=<?php echo $user['id_utilisateur']; ?>"><i class="far fa-edit"></i></a>
                        <a href="action_utilisateurs.php?action_type=delete&id_utilisateur=<?php echo $user['id_utilisateur']; ?> " onclick="return confirm('Voulez vous vraiment supprimer cette entrée ?');">X</a>
                    </td>
                </tr>
                <?php
        }
    } else { ?>
                <tr><td colspan="4">Aucun utilisateur trouvé......</td>
                <?php } ?>

            </table>


<?php
} ?>


<?php


if (isset($_GET['ajouter'])) {
    ?>


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

    if (isset($_POST['submit']) && isset($_POST['newsletter'])) {
        $user->newsletter($_POST['email']);
    } ?>
             <section id="container-register">
                <form action="inscription.php" method="post">
                    <h3>CRÉER UN COMPTE</h3>
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
                        <label for="newsletter">Inscrire à la newsletter </label>
                    </section>
                    <button type="submit" name="submit">Enregistrer Les informations</button>
                </form>
              </form>
            </section>
</section>
</section>
</section>
<?php
} ?>

<?php if (isset($_GET['id'])) {
        $userData = $db->getRows('utilisateurs', array('where'=>array('id_utilisateur'=>$_GET['id']),'return_type'=>'single'));
        if (!empty($userData)) {
            ?>

            <section id="container-register">

              <form method="post" action="action_utilisateurs.php"  >
                <section id="box-form">
                  <h3>MODIFIER LE COMPTE</h3>

                  <section id="box-password">
                           <section id="box-gender">
                               <label>CIVILITÉ</label>
                               <input type="radio" name="gender" id="female" value="Femme">
                               <label for="gender">madame</label>
                               <input type="radio" name="gender" id="male" value="Homme">
                               <label for="gender">monsieur</label>
                               <input type="radio" name="gender" id="no_gender" value="Non genré">
                               <label for="gender">non genré</label>
                           </section>

                           <section id="box-gender">
                               <label>ADMIN</label>
                               <input type="radio" name="is_admin" id="is_admin" value="1">
                               <label for="is_admin" value="1">Oui</label>
                               <input type="radio" name="is_admin" id="is_admin" value="2">
                               <label for="is_admin" value="2">Non</label>
                           </section>


                    <label>Name</label>
                    <input type="text"  name="nom" value="<?php echo $userData['nom']; ?>"/>
                    <label>prenom</label>
                    <input type="text" name="prenom" value="<?php echo $userData['prenom']; ?>"/>
                    <label>Email</label>
                    <input type="text"  name="email" value="<?php echo $userData['email']; ?>"/>
                    <label>Phone</label>
                    <input type="text"  name="phone" value="<?php echo $userData['phone']; ?>"/>
                    <label>gender</label>
                    <input type="text"  name="gender" value="<?php echo $userData['gender']; ?>"/>
                    <label>admin</label>
                    <input type="hidden" name="password" value="<?php echo $userData['password']; ?>"/>
                <input type="hidden" name="id_utilisateur" value="<?php echo $userData['id_utilisateur']; ?>"/>
                <input type="hidden" name="action_type" value="edit"/>
                <input type="submit"  name="submit" value="Modifier l'utilsateur"/>
            </form>
          </section>
        </section>
      </section>
<?php
        }
    } ?>



</section>
</main>
</body>
</html>
