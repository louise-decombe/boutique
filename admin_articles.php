<?php
include("includes/header.php");
require('admin_nav.php');

?>
<!DOCTYPE html>
<html>
<head>
    <title>boutique - homepage</title>
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

if($users->is_admin==1) {
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
          $sql .= ' where name like :name';
          $params[':name'] = "%" . addcslashes($_POST['recherche_valeur'], '_') . "%";
      }

      $resultats = $bdd->prepare($sql);
      $resultats->execute($params);
      if ($resultats->rowCount() > 0) {
          while ($d = $resultats->fetch(PDO::FETCH_ASSOC)) {
              ?>
  <div class="">
   <tr><td><?=$d['name'] ?></td><td><?=$d['description_article'] ?></td>
     <td><?=$d['nb_pages'] ?></td><td><?=$d['price'] ?></td>
     <td><?=$d['id_categorie'] ?></td><td><?=$d['date'] ?></td>

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
  	<td><input type="text" name="name" value="<?php echo "name" ?>"></td>
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
         <form action="inscription.php" method="post">
             <h3>CRÉER UN ARTICLE</h3>
             <section id="box-form">

<label for="">Nom</label>
                     <input type="text" name="name" placeholder="Nom de l'article*">
<label for="">Description</label>
                     <input type="textarea" name="description" placeholder="Description*">
<label for="">Nombre de pages</label>
                     <input type="number" name="nb_pages" placeholder="Nombre de pages*">
<label for="">Prix</label>
                     <input type="number" name="price" placeholder="prix de l'article*">
<label for="">Catégorie</label>
<select class="" name="">

</select>
             </section>
             <button type="submit" name="submit">Enregistrer les informations</button>
         </form>
     </section>

  </div>
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
