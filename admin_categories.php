<?php $page_selected = 'admin_categories.php'; ?>

<?php
include ("includes/header.php");
require ('admin_nav.php');

?>
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
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<main>
  <?php
if ($user->is_admin == 0)
{
?>

  <div class="admin">
    <div class="button">

  <a href="admin_categories.php?categorie">Voir les catégories</a><br/>
  <a href="admin_categories.php?sous_categorie">Voir les sous catégories</a><br/>
  <a href="admin_categories.php?ajouter">ajouter une catégorie ou sous catégorie</a><br/>
  </div>

  <?php
    if (isset($_GET['categorie']))
    {
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
        //recherche d'une catégorie dans la base de donnée
        $bdd = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
        $sql = 'SELECT * FROM categorie';
        $params = [];
        if (isset($_POST['recherche_valeur']))
        {
            $sql .= ' where nom_categorie like :nom_categorie';
            $params[':nom_categorie'] = "%" . addcslashes($_POST['recherche_valeur'], '_') . "%";
        }

        $resultats = $bdd->prepare($sql);
        $resultats->execute($params);
        if ($resultats->rowCount() > 0)
        {
            while ($d = $resultats->fetch(PDO::FETCH_ASSOC))
            {
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
        }
        else
        {
            echo '<tr><td>aucun résultat trouvé</td></tr>' . $connect = null;
        } ?>
    </div>

    </tbody>
  </table>
  <section id="container-register">

  <?php if (isset($_GET['modifier_categorie']))
        { ?>
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
<?php
        }
    } ?>


  <?php
    if (isset($_GET['sous_categorie']))
    {
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
        //recherche d'une sous catégorie dans la base de donnée
        $sql2 = 'SELECT * FROM sous_categorie';
        $params2 = [];
        if (isset($_POST['recherche_valeur']))
        {
            $sql2 .= ' where nom_sous_categorie like :nom_sous_categorie';
            $params2[':nom_sous_categorie'] = "%" . addcslashes($_POST['recherche_valeur'], '_') . "%";
        }
        $resultats2 = $bdd->prepare($sql2);
        $resultats2->execute($params2);
        if ($resultats2->rowCount() > 0)
        {
            while ($d2 = $resultats2->fetch(PDO::FETCH_ASSOC))
            {
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
        }
        else
        {
            echo '<tr><td>aucun résultat trouvé</td></tr>' . $connect = null;
        } ?>
    </div>

    </tbody>
  </table>
  <section id="container-register">

  <?php if (isset($_GET['modifier_sous_categorie']))
        { ?>
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
  <?php
        }
    } ?>


<div class="categories">

<?php
    if (isset($_GET['ajouter']))
    {
?>

      <section id="container-register">
         <form action="admin_categories.php" method="post">
             <h3>CRÉER UNE CATEGORIE</h3>
             <section id="box-form">

<label for="">Nom</label>
                     <input type="text" name="name_categorie" placeholder="Nom de la catégorie*">
   </section>
             <button type="submit" name="submit_categorie">Créer la catégorie</button>
         </form>
     </section>

     <section id="container-register">
        <form action="admin_categories.php" method="post">
            <h3>CRÉER UNE SOUS CATEGORIE</h3>
            <section id="box-form">

<label for="">Nom</label>
                    <input type="text" name="name_sous_categorie" placeholder="Nom de la sous catégorie*">
                    <label for="">Sous-catégorie</label>

                    <select name="categorie">
                    <?php
        $products = $db->query('SELECT * FROM categorie ');

        foreach ($products as $product):
            // On affiche chaque entrée une à une

?>
    <strong>catégorie</strong> : <?php echo "<option value = '" . $donnees->id_categorie . "'>" . $donnees->nom_categorie . "</option>";
?>
                             <br />
                           <?php endforeach; ?>

                       </select>


          </section>

            <button type="submit" name="submit_sous_categorie">Créer la sous-catégorie</button>
        </form>
    </section>


  </div>
<?php

            if (isset($_POST['submit_categorie']))
            {
                $id_categorie = 10;
                $nom_categorie = $_POST['name_categorie'];

                $ins = array(
                    $id_categorie
                );
                $db->insert('categorie', $ins, null);

                echo "la catégorie a bien été ajoutée";
            }

            if (isset($_POST['submit_sous_categorie']))
            {
                $id_sous_categorie = 10;
                $nom_sous_categorie = $_POST['name_sous_categorie'];
                $id_categorie = $_POST['id_categorie'];

                $ins = array(
                    $id_sous_categorie,
                    $nom_sous_categorie,
                    $id_categorie
                );
                $db->insert('sous_categorie', $ins,null);

                echo "la sous catégorie a bien été ajoutée";
            }

        }

    } ?>

</div>
<?php
?>

    </main>
    <footer>
      <?php include ('includes/footer.php'); ?>
  </footer>
  </body>
  </html>