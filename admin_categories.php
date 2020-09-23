<?php $page_selected = 'admin_categories'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>boutique - admin_categories</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/0mKd0xT/icon-round-fanzine.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/style-admin-general.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</head>
<body>
<header>
  <?php include("includes/header.php"); ?>
</header>
<?php
if (isset($_SESSION['user'])) {
    if ($user->is_admin == 1) {
        ?>
<main>
  <section id="nav-admin-pages">
    <?php require("admin_nav.php"); ?>
  </section>



  <center>
  <div class="container-valider">
  <div class="valider">

  <a href="admin_categories.php?categorie">Voir les catégories</a><br/>
</div>
<div class="valider">
  <a href="admin_categories.php?sous_categorie">Voir les sous catégories</a><br/>

</div>
<div class="valider">
  <a href="admin_categories.php?ajouter">ajouter une catégorie ou sous catégorie</a><br/>

</div>
</div>
</center>

  <div class="container-treatment">
<div class="treatment-order">
  <?php
    if (isset($_GET['categorie'])) {
        if (!empty($_SESSION['statusMsg'])) {
            echo '<p>'.$_SESSION['statusMsg'].'</p>';
            unset($_SESSION['statusMsg']);
        } ?>
        <h3>  Catégories<h3>
            <table>
                <tr>
                    <th>Nom de la catégorie</th>
                    <th></th>
                </tr>
                <?php
        $users = $db->getRows('categorie', array('order_by'=>'id_categorie DESC'));
        if (!empty($users)) {
            foreach ($users as $user) {
                ?>
                <tr>
                    <td><?php echo $user['nom_categorie']; ?></td>
                    <td>
                        <a href="admin_categories.php?id_categorie=<?php echo $user['id_categorie']; ?>"><i class="far fa-edit"></i></a>
                        <a href="action_categorie.php?action_type=delete&id_categorie=<?php echo $user['id_categorie']; ?> " onclick="return confirm('Are you sure?');">X</a>
                    </td>
                </tr>
                <?php
            }
        }
    } ?>
</table>
</div>
</div>
<div class="container-treatment">
<div class="treatment-order">
    <?php if (isset($_GET['sous_categorie'])) {
        if (!empty($_SESSION['statusMsg'])) {
            echo '<p>'.$_SESSION['statusMsg'].'</p>';
            unset($_SESSION['statusMsg']);
        } ?>

    <h3>  Sous catégories</h3>
      <table>
          <tr>
              <th>Nom de la sous catégorie</th>
              <th></th>
          </tr>
          <?php

  $users = $db->getRows('sous_categorie', array('order_by'=>'id_sous_categorie DESC'));
        if (!empty($users)) {
            $count = 0;
            foreach ($users as $user) {
                $count++; ?>
          <tr>
              <td><?php echo $user['nom_sous_categorie']; ?></td>


              <td>
                  <a href="admin_categories.php?id=<?php echo $user['id_sous_categorie']; ?>"><i class="far fa-edit"></i></a>
                  <a href="action_sous_categorie.php?action_type=delete&id_sous_categorie=<?php echo $user['id_sous_categorie']; ?> " onclick="return confirm('Are you sure?');">X</a>
              </td>
          </tr>
          <?php
            }
        }
    } ?>
</table>

</div>
</div>
<?php
    if (isset($_GET['id_categorie'])) {
        $userData = $db->getRows('categorie', array('where'=>array('id_categorie'=>$_GET['id_categorie']),'return_type'=>'single'));
        if (!empty($userData)) {
            ?>

            <section id="container-register">
              <form method="post" action="action_categorie.php" class="form" id="">
                <h3>MODIFIER LA CATEGORIE</h3>
                <section id="box-form">
                  <section id="box-password">

                    <label>Nom  catégorie</label>
                    <input type="text" class="" name="nom_categorie" value="<?php echo $userData['nom_categorie']; ?>"/>
                <input type="hidden" name="id_categorie" value="<?php echo $userData['id_categorie']; ?>"/>
                <input type="hidden" name="action_type" value="edit"/>
                <input type="submit" class="" name="submit" value="Mettre à jour"/>
            </form>
          </section>
        </section>
      </section>
    <?php
        }
    } ?>

<?php
    if (isset($_GET['id'])) {
        $userData = $db->getRows('sous_categorie', array('where'=>array('id_sous_categorie'=>$_GET['id']),'return_type'=>'single'));
        if (!empty($userData)) {
            ?>


            <section id="container-register">
              <form method="post" action="action_sous_categorie.php" class="" id="userForm">
                <h3>MODIFIER LA SOUS CATEGORIE</h3>
                <section id="box-form">
                  <section id="box-password">

                    <label>Nom sous catégorie</label>
                    <input type="text" class="" name="nom_sous_categorie" value="<?php echo $userData['nom_sous_categorie']; ?>"/>

                <input type="hidden" name="id_sous_categorie" value="<?php echo $userData['id_sous_categorie']; ?>"/>

                <select name="categorie">
                <?php
                $products = $db->query('SELECT * FROM categorie');

            foreach ($products as $product):
                // On affiche chaque entrée une à une

                ?>
                <strong>catégorie</strong> : <?php echo "<option value = '" . $product->id_categorie . "'>" . $product->nom_categorie . "</option>"; ?>
                <br />
                <?php endforeach; ?>
                  </select>
                <input type="hidden" name="action_type" value="edit"/>
                <input type="submit" class="" name="submit" value="Mettre à jour"/>
            </form>
          </section>
        </section>
      </section>

<?php
        }
    } ?>

<?php if (isset($_GET['ajouter'])) { ?>

              <section id="container-register">
                <form method="post" action="action_categorie.php" class="" id="userForm">
                  <h3>AJOUTER UNE CATEGORIE</h3>
                  <section id="box-form">
                    <section id="box-password">

                      <label>Nom de la catégorie</label>
                      <input type="text" class="" name="nom_categorie"/>

                  <input type="hidden" name="action_type" value="add"/>
                  <input type="submit" class="" name="submit" value="Ajouter une catégorie"/>
              </form>
            </section>
          </section>
        </section>


        <section id="container-register">
          <form method="post" action="action_sous_categorie.php" class="" id="userForm">
            <h3>AJOUTER UNE SOUS CATEGORIE</h3>
            <section id="box-form">
              <section id="box-password">
                      <label>Nom de la sous catégorie</label>
                      <input type="text" class="" name="nom_sous_categorie"/>
                      <label>catégorie</label>

<select name="categorie">
<?php
$products = $db->query('SELECT * FROM categorie');

foreach ($products as $product):
// On affiche chaque entrée une à une

?>
<strong>catégorie</strong> : <?php echo "<option value = '" . $product->id_categorie . "'>" . $product->nom_categorie . "</option>";
?>
<br />
<?php endforeach; ?>
  </select>
                  <input type="hidden" name="action_type" value="add"/>
                  <input type="submit" class="" name="submit" value="Ajouter une sous-catégorie"/>
              </form>
</section>
</section>
</section>
<?php
} ?>


<?php
    }
} else {
    echo "vous n'avez pas le droit d'accéder à cette page";
} ?>
    </main>
    <footer>
      <?php include('includes/footer.php'); ?>
  </footer>
  </body>
  </html>
