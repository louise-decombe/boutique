<?php
session_start();


?>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "boutique";
$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$id_article = $_GET['article'];

// Vérifier si le formulaire a été soumis
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Vérifie si le fichier a été uploadé sans erreur.
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];

        // Vérifie l'extension du fichier
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

        // Vérifie la taille du fichier - 5Mo maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

        // Vérifie le type MIME du fichier
        if(in_array($filetype, $allowed)){
            // Vérifie si le fichier existe avant de le télécharger.
            if(file_exists("uploads/" . $_FILES["photo"]["name"])){
                echo $_FILES["photo"]["name"] . " existe déjà.";
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "uploads/" . $_FILES["photo"]["name"]);
                echo "Votre fichier a été téléchargé avec succès.";

                $file_path="uploads/" . $_FILES["photo"]["name"];

                //récupérer le chemin du serveur soit avec une super globale SERVER ou le taper en dur

               // "UPDATE utilisateurs SET avatar='$file_path'"; //ajouter id article
//var_dump($id_article);

    # Transporte l'avatar et retourne son nom
    $query = $db->prepare('UPDATE image_article SET chemin = :chemin
  WHERE id_article = :id_article');
    $query->bindValue(':chemin', $file_path, PDO::PARAM_STR);
    $query->bindValue(':id_article', $id_article, PDO::PARAM_INT);
    $query->execute();
    $query->CloseCursor();

    header("location:".  $_SERVER['HTTP_REFERER']);

        //        header("location:admin_articles.php");

            }
        } else{
            echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.";
            header("location:".  $_SERVER['HTTP_REFERER']);

        }
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
        header("location:".  $_SERVER['HTTP_REFERER']);

    }
}



?>
