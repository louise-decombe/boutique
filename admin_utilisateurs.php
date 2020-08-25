<?php $page_selected = 'admin_utilisateurs.php'; ?>
<?php
require("admin.class.php");
include("includes/header.php");
require("admin_nav.php")
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
<header>

</header>
<main>
<div class="admin">

<div class="button">
  <a href="admin_utilisateurs.php?utilisateurs">Voir les utilisateurs</a><br/>
  <a href="admin_utilisateurs.php?ajouter">ajouter un utilisateur</a><br/>
</div>

<?php

if (isset($_GET['utilisateurs'])) {
    ?>
<div class="boucle">

<h3>Chercher un utilisateur dans la liste</h3>
 <form method='post'>
	 <input type='text' placeholder='recherche' name="recherche_valeur"/>
	 <input type='submit' value="Rechercher"/>
	 <input type='submit' value="Afficher tout utilisateurs"/>

 </form>

</form>
<table>
  <thead>
    <tr><th>Nom</th><th>Prénom</th><th>Genre</th><th>Email</th><th>Admin</th><th>Date création</th></</tr>
  </thead>
  <tbody>
    <?php

    //recherche d'un utilisateur dans la base de donnée
    $bdd = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
    $sql = 'SELECT * FROM utilisateurs';
    $params = [];
    if (isset($_POST['recherche_valeur'])) {
        $sql .= ' where nom like :nom';
        $params[':nom'] = "%" . addcslashes($_POST['recherche_valeur'], '_') . "%";
    }

    $resultats = $bdd->prepare($sql);
    $resultats->execute($params);
    if ($resultats->rowCount() > 0) {
        while ($d = $resultats->fetch(PDO::FETCH_ASSOC)) {
            ?>
<div class="">
 <tr><td><?=$d['nom'] ?></td><td><?=$d['prenom'] ?></td>
   <td><?=$d['gender'] ?></td><td><?=$d['email'] ?></td>
   <td><?=$d['is_admin'] ?></td><td><?=$d['date_registration'] ?></td>

     <td><a href="admin_utilisateurs.php?utilisateurs&modifier_compte=<?php echo $d['id_utilisateur'] ?>">modifier</a></td>
   <td><a href="admin_utilisateurs.php?utilisateur&supprimer_compte=<?php echo $d['id_utilisateur'] ?>">supprimer</a></td>
</div>
        <?php
        }
        //fin de la requête
        $resultats->closeCursor();

if(isset($_GET['supprimer_compte'])){

$req->delete('user',' id = 1');

}


    } else {
        echo '<tr><td>aucun résultat trouvé</td></tr>' . $connect = null;
    } ?>
  </div>

  </tbody>
</table>
<section id="container-register">

<?php if (isset($_GET['modifier_compte'])) { ?>
<form name="modification" action="" method="POST">
<table border="0" align="center" cellspacing="2" cellpadding="2">
<tr align="center">
<td>Nom</td>
	<td><input type="text" name="nom" value="<?php echo $info['nom']; ?>"></td>
</tr>
<tr align="center">
<td>Prénom</td>
	<td><input type="text" name="prenom" value="<?php echo $info['nom']; ?>"></td>
</tr>
<tr align="center">
<td>Email</td>
<td><input type="text" name="email"value="<?php echo $info['email'] ; ?>"></td>
</tr>
<tr align="center">
<td>Gender</td>
<td><input type="text" name="email"value="<?php echo $info['email'] ; ?>"></td>
</tr>
<tr align="center">
<td>Admin</td>
<td>
<select name="is_admin" id="is_admin">
	<option value="0">utilisateur</option>
	<option value="1">admin</option>
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
           <h3>CRÉER UN COMPTE</h3>
           <section id="box-form">

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

                   <input type="text" name="email" placeholder="email@email.com*">

                   <input type="tel" name="phone" placeholder="0123456789*">

                   <section id="box-password">
                       <label for="password">password</label>
                       <input type="password" name="password" placeholder="mot de passe*">
                       <label for="conf_password">confirmation password</label>
                       <input type="password" name="conf_password" placeholder="confirmer le mot de passe*">
                   </section>

           </section>
           <button type="submit" name="submit">Enregistrer les informations</button>
       </form>
   </section>

</div>
<?php } ?>
</main>
</body>
</html>
