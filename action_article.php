<?php
session_start();
include 'class/db.php';
$db = new DB();
$tblName = 'article';
$tblName2 = 'stock';
if (isset($_REQUEST['action_type']) && !empty($_REQUEST['action_type'])) {
    if ($_REQUEST['action_type'] == 'add') {
        $userData = array(
'nom_article' => $_POST['nom_article'],
'id_categorie' => $_POST['id_sous_categorie'],
'id_sous_categorie' => $_POST['id_sous_categorie'],
'auteur_article' => $_POST['auteur_article'],
'editions_article' => $_POST['editions_article'],
'description_article' => $_POST['description_article'],
'citation_article' => $_POST['citation_article'],
'nb_pages' => $_POST['nb_pages'],
'annee_parution' => $_POST['annee_parution'],
'prix_article' => $_POST['prix_article']
        );

$stock = array(
'id_article' => $_POST['id_article'],
'nb_articles_stock' => $_POST['nb_articles_stock'],
'id_sous_categorie' => $_POST['id_sous_categorie'],
'auteur_article' => $_POST['auteur_article'],
);
        $insert = $db->insert($tblName, $userData);
        $insert = $db->insert($tblName2, $array);

        $PDO = new PDO('mysql:host=localhost;dbname=boutique','root','');
        $id_article= $_POST['id_article'];
        $nb_article_stock = $_POST['nb_articles_stock'];

         $req = $PDO->prepare("INSERT INTO stock (id_article, nb_articles_stock, date_check_stock) VALUES ('".$id_article."', '".$nb_article_stock."',  NOW())");
          $req->execute(array(
              "id_article" => $id_article,
              "nb_articles_stock" => $nb_article_stock
              ));
          $data = $req->fetchAll();


        $statusMsg = $insert?'Les données ont été insérées.':'Des problèmes sont survenus, reassayez.';
        $_SESSION['statusMsg'] = $statusMsg;
        var_dump($insert);
      //  header("Location:admin_articles.php");
    } elseif ($_REQUEST['action_type'] == 'edit') {
        if (!empty($_POST['id_article'])) {
            $userData = array(
              'nom_article' => $_POST['nom_article'],
              'id_categorie' => $_POST['id_sous_categorie'],
              'id_sous_categorie' => $_POST['id_sous_categorie'],
              'auteur_article' => $_POST['auteur_article'],
              'editions_article' => $_POST['editions_article'],
              'description_article' => $_POST['description_article'],
              'citation_article' => $_POST['citation_article'],
              'nb_pages' => $_POST['nb_pages'],
              'annee_parution' => $_POST['annee_parution'],
              'prix_article' => $_POST['prix_article']
            );
            $condition = array('id_article' => $_POST['id_article']);
            $update = $db->update($tblName, $userData, $condition);
            $statusMsg = $update?'Les données ont été mises à jour.':'un problème est survenu, essayez encore.';
            $_SESSION['statusMsg'] = $statusMsg;
            header("Location:admin_articles.php");
        }
    } elseif ($_REQUEST['action_type'] == 'delete') {
        if (!empty($_GET['id_article'])) {
            $condition = array('id_article' => $_GET['id_article']);
            $delete = $db->delete($tblName, $condition);
            $statusMsg = $delete?'Les données ont été supprimées.':'Des problèmes sont survenus essayez encore.';
            $_SESSION['statusMsg'] = $statusMsg;
            //header("Location:admin_articles.php");
        }
    }
}
