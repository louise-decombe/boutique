<?php $page_selected = 'search.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>boutique - homepage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/0mKd0xT/icon-round-fanzine.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<header>
   <?php
    include("includes/header.php");
   ?>
</header>
<main>
  <?php
  $bdd = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');

?>
<section id="container-register">

           <form method='post'>
             <section id="box-form">

          	 <input type='text' placeholder='recherche' name="recherche_valeur"/>
          	 <input type='submit' value="Rechercher"/>
</section>
</section>
           </form>
           <table>

          	 <tbody>
          		 <?php
              $sql = 'SELECT * FROM article';
              $params = [];
              if (isset($_POST['recherche_valeur'])) {
                  $sql .= ' where nom_article like :nom_article';
                  $params[':nom_article'] = "%" . addcslashes(trim($_POST['recherche_valeur']), '_') . "%";
              }
              $resultats = $bdd->prepare($sql);
              $resultats->execute($params);
              if ($resultats->rowCount() > 0) {
                  while ($d = $resultats->fetch(PDO::FETCH_ASSOC)) {
                      ?><tr>
          <td><?=$d['nom_article'] ?></td>
          	<td><?=$d['auteur_article'] ?></td>
              <td><?=$d['prix_article'] ?>  euros  </td>
          			<td><a href="item.php?id=<?php echo $d['id_article'] ?>">Voir</a></td>
</tr>
          				 <?php
                  }
                  $resultats->closeCursor();
              } else {
                  echo '<tr><td>aucun résultat trouvé</td></tr>' . $connect = null;
              } ?>
</table><br/>
</main>
<footer>
   <?php
    include("includes/footer.php");
   ?>
</footer>
</body>

</html>
