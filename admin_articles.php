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
          <link rel="stylesheet" href="css/admin.css">

    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

  <?php
if ($user->is_admin==0) {
    ?>
  <a href="admin_articles.php?articles">Voir les articles</a><br/>
  <a href="admin_articles.php?ajouter">ajouter un article</a><br/>

  <?php

  if (isset($_GET['articles'])) {
      if (!empty($_SESSION['statusMsg'])) {
          echo '<p>'.$_SESSION['statusMsg'].'</p>';
          unset($_SESSION['statusMsg']);
      } ?>
      <div class="container-treatment">
    <div class="treatment-order">
          <div class="titre">
<h3>ARTICLES </h3>
          </div>
            <table class="table">
                <tr>
                    <th >Nom du fanzine</th>
                    <th >Auteur</th>
                    <th >Editions</th>
                    <th >Citation</th>
                    <th >Nbe de pages</th>
                    <th >Année de parution</th>
                    <th >Prix</th>
                    <th >Date d'ajout</th>
                    <th></th>

                </tr>
                <?php

        $users = $db->getRows('article', array('order_by'=>'id_article DESC'));
      if (!empty($users)) {
          $count = 0;
          foreach ($users as $user) {
              $count++; ?>
                <tr>
                    <td><?php echo $user['nom_article']; ?></td>
                    <td><?php echo $user['auteur_article']; ?></td>
                    <td><?php echo $user['editions_article']; ?></td>
                    <td><?php echo $user['citation_article']; ?></td>
                    <td><?php echo $user['nb_pages']; ?></td>
                    <td><?php echo $user['annee_parution']; ?></td>
                    <td><?php echo $user['prix_article']; ?>   euros</td>
                    <td><?php echo $user['date_registration']; ?></td>
                    <td>
                        <a href="admin_articles.php?id_article=<?php echo $user['id_article']; ?>" class="glyphicon glyphicon-edit"></a>
                        <a href="action_article.php?action_type=delete&id_article=<?php echo $user['id_article']; ?> " onclick="return confirm('Voulez vous vraiment supprimer cette entrée?');">X</a>
                    </td>
                </tr>
                <?php
          }
      } else { ?>
                <tr><td colspan="4">Aucun article trouvé......</td>
                <?php }
  } ?>
    </div>    </div>


    </tbody>
  </table>
  <?php
  //
//modification d'un article
//
   if (isset($_GET['id_article'])) {
       $userData = $db->getRows('article', array('where'=>array('id_article'=>$_GET['id_article']),'return_type'=>'single'));
       if (!empty($userData)) {
           ?>
          <section id="container-register">
            <form method="post" action="action_article.php" class="" id="">
              <h3>MODIFIER L'ARTICLE</h3>
              <section id="box-form">
                <section id="box-password">

                <div class="">
                    <label>Nom de l'article</label>
                    <input type="text" class="" name="nom_article" value="<?php echo $userData['nom_article']; ?>"/>
                </div>
                <div class="">
                    <label>Auteur de l'article</label>
                    <input type="text" class="" name="auteur_article" value="<?php echo $userData['auteur_article']; ?>"/>
                </div>
                <div class="">
                    <label>Edition de l'article</label>
                    <input type="text" class="" name="editions_article" value="<?php echo $userData['editions_article']; ?>"/>
                </div>
                <div class="">
                    <label>Description</label>
                    <input type="textarea" class="" name="description_article" value="<?php echo $userData['description_article']; ?>"/>
                </div>
                <div class="">
                    <label>Citation de l'article</label>
                    <input type="textarea" class="" name="citation_article" value="<?php echo $userData['citation_article']; ?>"/>
                </div>
                <div class="">
                    <label>Nombre de pages </label>
                    <input type="number" class="" name="nb_pages" value="<?php echo $userData['nb_pages']; ?>"/>
                </div>
                <div class="">
                    <label>Année de parution </label>
                    <input type="number" class="" name="annee_parution" value="<?php echo $userData['annee_parution']; ?>"/>
                </div>
                <div class="">
                    <label>Prix </label>
                    <input type="number" class="" name="prix_article" value="<?php echo $userData['prix_article']; ?>"/>
                </div>

                <div class="">
                    <label>Catégorie</label>

  <select name="id_sous_categorie">
  <?php
  $products = $db->query('SELECT * FROM sous_categorie');

           foreach ($products as $product):
  // On affiche chaque entrée une à une

  ?>
  <strong>Sous catégorie</strong> : <?php echo "<option value = '" . $product->id_sous_categorie . "'>" . $product->nom_sous_categorie . "</option>"; ?>
  <br />
  <?php endforeach; ?>
  </select>
  </div>
                <input type="hidden" name="action_type" value="add"/>
                <input type="submit" class="submit" name="submit_article" value="Modifier le fanzine"/>


            <section id="modification">


              <h3>Illustration du fanzine</h3>
              <form id="" method="POST">
                <?php

    $id_article = $_GET['id_article'];
           $item = $category->article_infos($id_article);

           $img = $db->query("SELECT chemin FROM image_article WHERE id_article='$id_article'"); ?>
                    <center> <img src="<?= ($item['chemin'])?>" width="30%" alt="cover-fanzine"></center><br/>

                <label> adresse url de l'image </label>
                <input type="text" id="" name="linkimg" accept="image/png, image/jpeg">
                <input type="submit" name="submit1" value="Mettre à jour">
              </form>

              <form id="formfiles" action="upload.php" method="post" enctype="multipart/form-data">
                <label for="fileUpload">ou sélectionner votre fichier:</label>
                <div id="inputfiles">
                <input type="file" name="photo" id="">
                <input type="submit" name="submit" value="Mettre à jour">
                </div>
                <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .jpeg, .gif, .png sont autorisés jusqu'à une taille maximale de 5 Mo.</p>
              </form>
            </form>
      </section>
    </section>
  </section>
</section>
  <?php  ?>


    <?php
       }
   } ?>

  <?php
//
//ajout d'une article
//
  if (isset($_GET['ajouter'])) {
      $userData = $db->getRows('article', array('where'=>array('id_article'=>$_GET['ajouter']),'return_type'=>'single')); ?>


 <section id="container-register">
   <form method="post" action="action_article.php" class="form">
     <section id="box-form">
       <h3>AJOUTER UN ARTICLE 1/3</h3>
       <h3>Informations principales</h3>

       <section id="box-password">
                          <label>Nom de l'article</label>
                          <input type="text" class="form-control" name="nom_article"/>
                          <label>Auteur de l'article</label>
                          <input type="text" class="form-control" name="auteur_article"/>
                          <label>Edition de l'article</label>
                          <input type="text" class="form-control" name="editions_article"/>
                          <label>Description</label>
                          <input type="textarea" class="form-control" name="description_article"/>
                          <label>Citation de l'article</label>
                          <input type="textarea" class="form-control" name="citation_article"/>
                          <label>Nombre de pages </label>
                          <input type="number" class="form-control" name="nb_pages" value="0" min="0" max="9000"/>
                          <label>Année de parution </label>
                          <input type="number" class="form-control" name="annee_parution" value="2020" min="1900" max="2050"/>
                          <label>Prix </label>
                          <input type="number" class="form-control" name="prix_article" value="0" min="0" max="100000"/>
                          <label>catégorie</label>
                        <select name="id_sous_categorie">
                        <?php
                        $products = $db->query('SELECT * FROM sous_categorie');
      foreach ($products as $product):
                        ?>
                        <strong>Sous catégorie</strong> : <?php echo "<option value = '" . $product->id_sous_categorie . "'>" . $product->nom_sous_categorie . "</option>"; ?>
                        <br />
                        <?php endforeach; ?>
                        </select></div>
                      <input type="hidden" name="action_type" value="add"/>
                      <input type="submit" class="submit" name="submit_form1" value="Valider"/>
                    </form>
                  </section>
                  </section>
                  </section>
<?php
  } ?>
                      <?php
if (isset($_GET['submit_form1'])) { ?>
  <section id="container-register">
  <form class="" action="action_stock.php" method="post">
    <h3>AJOUTER UN ARTICLE 2/3</h3>
    <h3>Stock</h3>
     <section id="box-form">

  <input type="number" name="nb_articles_stock" value="0" min="0" max="10000">
  <input type="submit" name="submit_form2" value="Valider">
  </form>
</section>
</section>

<?php } ?>

<?php if (isset($_GET['submit_form2'])) {?>
  <section id="container-register">
    <form id="" method="POST">

                        <h3>AJOUTER UN ARTICLE 3/3</h3>
                        <h3>Illustration du fanzine</h3>
                          <section id="box-form">
                            <form id="formpic" method="POST">
            <label> adresse url de l'image </label>
            <input type="text" id="avatar" name="linkimg" accept="image/png, image/jpeg">
            <input type="submit" name="submit1" value="Upload">
          </form>

          <form id="formfiles" action="upload.php" method="post" enctype="multipart/form-data">
            <label for="fileUpload">ou sélectionner votre fichier:</label>
            <div id="inputfiles">
            <input type="file" name="photo" id="fileUpload">
            <input type="submit" name="submit" value="Upload">
            </div>
                </section>
                  </form>

    <?php     if (isset($_POST['submit1'])) {
      $link = addslashes($_POST['linkimg']);
      $request2 = "UPDATE `image_article` SET `chemin`='$link' WHERE id_article = '$_SESSION[login]'";
      $result2 = mysqli_query($connect, $request2);
  }
?>


    <?php
  }
} else {
    echo "vous n'avez pas le droit d'accéder à cette page, bien essayé ;)";
    echo "<a href='index.php'> Retour à l'accueil </a>";
}   ?>
  </main>
  </body>
  </html>

</main>
</body>
</html>
