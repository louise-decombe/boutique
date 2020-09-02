<?php

try
{

$connexion=new PDO("mysql:host=localhost;dbname=boutique",'root','');
$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
echo($_GET['id_page']);
$data = $connexion->prepare("SELECT * FROM article as A INNER JOIN image_article as I ON A.id_article = I.id_article WHERE A.id_sous_categorie = '".$_GET['id_page']."' AND A.id_article > '".$_GET['id_item']."' order by A.id_article LIMIT 8");
$data->execute();
$datas = $data->fetchAll();

$output = "";
    foreach($datas as $dat){

    $output .='
        <section id="container-article">
            <a href="item.php?id="'.$dat['id_article'].'"><img src="'.$dat['chemin'].'"></a>
            <a id="title-article" href="item.php?id= "'.$dat['id_article'].'"><"'.$dat['nom_article'].'"</a>
        </section>';
    }

    if(empty($dat['id_article'])){
        echo 'consulter une autre catégorie';
    }else
    {
        $output .='
        <section id="remove-row">
        <button id="load_more" data-id="'.$dat['id_article'].'" data-id_page="'.$_GET['id_page'].'">LOAD MORE</button>
        </section>';

    }

    echo $output;

}

catch (PDOException $e)
        {
        echo "Erreur : " . $e->getMessage();
        }

?>
