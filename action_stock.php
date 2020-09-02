<?php
session_start();
include 'class/db.php';
$db = new DB();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "boutique";
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM article";
  // use exec() because no results are returned
  $conn->exec($sql);
  $last_id = $conn->lastInsertId();
  echo "New record created successfully. Last inserted ID is: " . $last_id;

      $id_article= $last_id;
      $nb_article_stock = $_POST['nb_articles_stock'];

       $req = $conn->prepare("INSERT INTO stock (id_article, nb_articles_stock, date_check_stock) VALUES ('".$id_article."', '".$nb_article_stock."',  NOW())");
        $req->execute(array(
            "id_article" => $id_article,
            "nb_articles_stock" => $nb_article_stock
            ));

        var_dump("$req");
      //  header("Location:admin_articles.php?submit_form2");




?>
