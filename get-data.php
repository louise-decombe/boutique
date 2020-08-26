<?php
include("includes/header.php");

if(isset($_GET['offset']) && isset($_GET['limit'])){

    $limit = $_GET['limit'];
    $offset = $_GET['offset'];

    $data = $db->query("SELECT * FROM article as A INNER JOIN image_article as I ON A.id_article = I.id_article WHERE A.id_sous_categorie = $id_sub LIMIT{$LIMIT} OFFSET {$offset} ");

    foreach ($data as $article){

    }

    
}


?>