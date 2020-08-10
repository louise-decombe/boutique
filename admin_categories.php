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

  <a href="admin_categories.php?categorie">Voir les catégories</a><br/>
  <a href="admin_categories.php?sous_categorie">Voir les sous catégories</a><br/>
  <a href="admin_categories.php?ajouter">ajouter une catégorie ou sous catégorie</a><br/>
  </div>

  <?php

  if (isset($_GET['categorie'])) {
      ?>
  <div class="boucle">

  <h3>Chercher une catégorie dans la liste</h3>
   <form method='post'>
  	 <input type='text' placeholder='recherche' name="recherche_valeur"/>
  	 <input type='submit' value="Rechercher"/>
  	 <input type='submit' value="Afficher toutes les catégories"/>
   </form>

  </form>
  <table>
    <thead>
      <tr><th>Id</th><th>Nom</th></tr>
    </thead>
    <tbody>
      <?php

      //recherche d'un utilisateur dans la base de donnée
      $bdd = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
      $sql = 'SELECT * FROM categorie';
      $params = [];
      if (isset($_POST['recherche_valeur'])) {
          $sql .= ' where nom_categorie like :nom_categorie';
          $params[':nom_categorie'] = "%" . addcslashes($_POST['recherche_valeur'], '_') . "%";
      }

      $resultats = $bdd->prepare($sql);
      $resultats->execute($params);
      if ($resultats->rowCount() > 0) {
          while ($d = $resultats->fetch(PDO::FETCH_ASSOC)) {
              ?>
  <div class="">
   <tr><td><?=$d['nom_categorie'] ?></td><td><?=$d['id_categorie'] ?></td>
       <td><a href="admin_categories.php?categorie&modifier_categorie=<?php echo $d['id_categorie'] ?>">modifier</a></td>
     <td><a href="admin_categories.php?categorie&supprimer_categorie=<?php echo $d['id_categorie'] ?>">supprimer</a></td>
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

  <?php if (isset($_GET['modifier_categorie'])) { ?>
  <form name="modification" action="" method="POST">
  <table border="0" align="center" cellspacing="2" cellpadding="2">
  <tr align="center">
  <td>Nom de la catégorie</td>
  	<td><input type="text" name="name" value="<?php echo "nom catégorie" ?>"></td>
  </tr>
  </tr>
<td><input type='submit' value="Modifier"/></td>

  </table>
  </form>
  </section>
<?php }} ?>


  <?php

  if(isset($_GET['sous_categorie'])) {
      ?>
  <div class="boucle">

  <h3>Chercher une sous catégorie dans la liste</h3>
   <form method='post'>
  	 <input type='text' placeholder='recherche' name="recherche_valeur"/>
  	 <input type='submit' value="Rechercher"/>
  	 <input type='submit' value="Afficher toutes les catégories"/>
   </form>

  </form>
  <table>
    <thead>
      <tr><th>Id</th><th>Nom</th></tr>
    </thead>
    <tbody>
      <?php

      //recherche d'un utilisateur dans la base de donnée
      $bdd = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
      $sql2 = 'SELECT * FROM sous_categorie';
      $params2 = [];
      if (isset($_POST['recherche_valeur'])) {
          $sql2 .= ' where nom_sous_categorie like :nom_sous_categorie';
          $params2[':nom_sous_categorie'] = "%" . addcslashes($_POST['recherche_valeur'], '_') . "%";
      }
      $resultats2 = $bdd->prepare($sql2);
      $resultats2->execute($params2);
      if ($resultats2->rowCount() > 0) {
          while ($d2 = $resultats2->fetch(PDO::FETCH_ASSOC)) {
              ?>
  <div class="">
   <tr><td><?=$d2['nom_sous_categorie'] ?></td><td><?=$d2['id_sous_categorie'] ?></td>
       <td><a href="admin_categories.php?sous_categorie&modifier_sous_categorie=<?php echo $d2['id_sous_categorie'] ?>">modifier</a></td>
     <td><a href="admin_categories.php?sous_categorie&supprimer_sous_categorie=<?php echo $d2['id_sous_categorie'] ?>">supprimer</a></td>
  </div>
          <?php
          }
          //fin de la requête
          $resultats2->closeCursor();
      } else {
          echo '<tr><td>aucun résultat trouvé</td></tr>' . $connect = null;
      } ?>
    </div>

    </tbody>
  </table>
  <section id="container-register">

  <?php if (isset($_GET['modifier_sous_categorie'])) { ?>
  <form name="modification" action="" method="POST">
  <table border="0" align="center" cellspacing="2" cellpadding="2">
  <tr align="center">
  <td>Nom de la catégorie</td>
  	<td><input type="text" name="name" value="<?php echo "nom sous catégorie" ?>"></td>
  </tr>
  </tr>
<td><input type='submit' value="Modifier"/></td>

  </table>
  </form>
  </section>
  <?php } ?>

  <?php
} ?>


<div class="categories">

<?php

      if (isset($_GET['ajouter'])) {
          ?>

      <section id="container-register">
         <form action="inscription.php" method="post">
             <h3>CRÉER UNE CATEGORIE</h3>
             <section id="box-form">

<label for="">Nom</label>
                     <input type="text" name="name" placeholder="Nom de la catégorie*">
   </section>
             <button type="submit" name="submit">Enregistrer les informations</button>
         </form>
     </section>

     <section id="container-register">
        <form action="inscription.php" method="post">


            <h3>CRÉER UNE SOUS CATEGORIE</h3>
            <section id="box-form">

<label for="">Nom</label>
                    <input type="text" name="name" placeholder="Nom de la sous catégorie*">
                    <label for="">Catégorie</label>
<select class="" name="catégorie">

</select>
          </section>

            <button type="submit" name="submit">Enregistrer les informations</button>
        </form>
    </section>

  </div>
<?php
} ?>

</div>
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
