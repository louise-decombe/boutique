<?php
session_start();
include 'class/db.php';
$db = new DB();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "boutique";
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

$reponse = $conn->query("SELECT id_article FROM article ORDER BY id_article DESC LIMIT 0, 1");
$id = $reponse->fetch();
$id_article= $id['id_article'];
$nb_articles_stock = $_POST['nb_articles_stock'];
$date_check_stock = date("Y-m-d H:i:s");


  $query = $conn->prepare('INSERT INTO stock( `id_article`, `nb_articles_stock`, `date_check_stock`)
    VALUES (:id_article, :nb_articles_stock, :date_check_stock)');
  $query->bindValue(':id_article', $id_article, PDO::PARAM_STR);
  $query->bindValue(':nb_articles_stock', $nb_articles_stock, PDO::PARAM_STR);
  $query->bindValue(':date_check_stock', $date_check_stock, PDO::PARAM_STR);
  $query->execute();
var_dump($id_article);
header("Location:admin_articles.php?submit_form2");
