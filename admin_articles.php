<?php $page_selected = 'admin_articles.php'; ?>

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
          <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<main>
  <?php

if($user->is_admin==0) {
   ?>
  <div class="admin">
    <div class="button">

  <a href="admin_articles.php?articles">Voir les articles</a><br/>
  <a href="admin_articles.php?ajouter">ajouter un article</a><br/>
  </div>

  <?php

  if (isset($_GET['articles'])) {
      ?>
  <div class="boucle">

  <h3>Chercher un article dans la liste</h3>
   <form method='post'>
  	 <input type='text' placeholder='recherche' name="recherche_valeur"/>
  	 <input type='submit' value="Rechercher"/>
  	 <input type='submit' value="Afficher tout les articles"/>

   </form>

  </form>
  <table>
    <thead>
      <tr><th>Titre</th><th>Description</th><th>Nbe pages</th><th>Prix</th><th>Catégorie</th><th>Date ajout</th></tr>
    </thead>
    <tbody>
      <?php

      //recherche d'un utilisateur dans la base de donnée
      $bdd = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
      $sql = 'SELECT * FROM article';
      $params = [];
      if (isset($_POST['recherche_valeur'])) {
          $sql .= ' where nom_article like :nom_article';
          $params[':nom_article'] = "%" . addcslashes($_POST['recherche_valeur'], '_') . "%";
      }

      $resultats = $bdd->prepare($sql);
      $resultats->execute($params);
      if ($resultats->rowCount() > 0) {
          while ($d = $resultats->fetch(PDO::FETCH_ASSOC)) {
              ?>
  <div class="">
   <tr><td><?=$d['nom_article'] ?></td><td><?=$d['description_article'] ?></td>
     <td><?=$d['nb_pages'] ?></td><td><?=$d['prix_article'] ?></td>
     <td><?=$d['citation_article'] ?></td><td><?=$d['date_ajout'] ?></td>

       <td><a href="admin_articles.php?articles&modifier_article=<?php echo $d['id'] ?>">modifier</a></td>
     <td><a href="admin_articles.php?articles&supprimer_article=<?php echo $d['id'] ?>">supprimer</a></td>
  </div>
          <?php
          }
          //fin de la requête
          $resultats->closeCursor();
      } else {
          echo '<tr><td>aucun résultat trouvé</td></tr>' . $connect = null;
      } ?>
    </div>

    </tbody>
  </table>
  <section id="container-register">

  <?php if (isset($_GET['modifier_article'])) { ?>
  <form name="modification" action="" method="POST">
  <table border="0" align="center" cellspacing="2" cellpadding="2">
  <tr align="center">
  <td>Nom de l'article</td>
  	<td><input type="text" name="nom_article" value="<?php echo "nom_article" ?>"></td>
  </tr>
  <tr align="center">
  <td>Description</td>
  	<td><input type="textarea" name="description" value="<?php echo "description" ?>"></td>
  </tr>
  <tr align="center">
  <td>Nombre de page</td>
  <td><input type="number" name="nb_pages"value="<?php echo '20' ?>"></td>
  </tr>
  <tr align="center">
  <td>Prix</td>
  <td><input type="number" name="price"value="<?php echo '20'; ?>"></td>
  </tr>
  <tr align="center">
  <td>Sous-catégorie</td>
  <td>
  <select name="sous_categorie" id="sous_categorie">
  	<option value="0">cat1</option>
  	<option value="1">cat2</option>
  </td>
  </tr>
  <tr align="center">
  <td><input name="modifier" type="submit" value="modifier"></td>
  <td><button> <a href="admin_utilisateurs.php?utilisateurs"> Fermer</a> </button> </td>
  </tr>
  </table>
  </form>
  </section>
  <?php } ?>


  <?php
  }

  if (isset($_GET['ajouter'])){
      ?>

      <section id="container-register">
         <form action="" method="post">
             <h3>CRÉER UN ARTICLE</h3>
             <section id="box-form">

<label for="">Nom</label>
                     <input type="text" name="nom_article" placeholder="Nom de l'article*">
<label for="">Auteur</label>
                      <input type="text" name="auteur_article" placeholder="Auteur de l'article*">
<label for="">Edition</label>
                      <input type="text" name="editions_article" placeholder="Edition de l'article*">
<label for="">Description</label>
                     <input type="textarea" name="description_article" placeholder="Description*">
<label for="">Citation</label>
                      <input type="textarea" name="citation_article" placeholder="Citation*">
<label for="">Nombre de pages</label>
                     <input type="number" name="nb_pages" placeholder="Nombre de pages*">
<label for="">Prix</label>
                     <input type="number" name="prix_article" placeholder="prix de l'article*">
<label for="annee_parution">Année parution:</label>
                    <input type="number" name="annee_parution">
<label for="">Sous-catégorie</label>
<select name="sous_categorie">
<?php
$products = $db->query('SELECT * FROM sous_categorie');

foreach ($products as $product):
// On affiche chaque entrée une à une

?>
         <strong>sous-catégorie</strong> : <?php echo "<option value = '" . $product->id_sous_categorie . "'>" . $product->nom_sous_categorie . "</option>";
?>
         <br />
       <?php endforeach; ?>

   </select>
             </section>
             <button type="submit" name="submit_article">Enregistrer les informations</button>
         </form>
     </section>

  </div>



<?php

if (isset($_POST['submit_article']))
{
  $id_article=21;
  $id_sous_categorie=1;
  $nom_article=$_POST['auteur_article'];
  $auteur_article=$_POST['auteur_article'];
  $editions_article=$_POST['editions_article'];
  $description_article=$_POST['description_article'];
  $citation_article=$_POST['citation_article'];
  $nb_page=$_POST['nb_pages'];
  $annee_parution=$_POST['annee_parution'];
  $prix_article=$_POST['prix_article'];
  $date_ajout=date("Y-m-d H:i:s");


    $ins = array(
      $id_article,
      $id_sous_categorie,
      $nom_article,
      $auteur_article,
      $editions_article,
      $description_article,
      $citation_article,
      $nb_page,
      $annee_parution,
      $prix_article,
      $date_ajout
    );
    $db->insert('article', $ins, null);

//var_dump($ins);
    echo "l'article a bien été ajouté";
}

 ?>




  <?php } ?>
<?php }else{
  echo "vous n'avez pas le droit d'accéder à cette page, bien essayé ;)";
  echo "<a href='index.php'> Retour à l'accueil </a>";
} ?>
  </main>
  </body>
  </html>

</main>
</body>
</html>
