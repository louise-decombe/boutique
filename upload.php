<?php
session_start();


?>
        <section id="modification">
          <h1>complète ton profil ou modifie tes infos de connexion</h1>
          <form id="formpic" method="POST">
            <label> adresse url de l'image </label>
            <input type="text" id="avatar" name="linkimg" accept="image/png, image/jpeg">
            <input type="submit" name="submit1" value="Upload">
          </form>

          <form id="formfiles" action="upload.php" method="post" enctype="multipart/form-data">
            <label for="fileUpload">ou sélectionner votre fichier:</label>
            <div id="inputfiles">
            <input type="file" name="photo" id="fileUpload">
            <input type="submit" name="submit" value="Upload">
            </div>
            <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .jpeg, .gif, .png sont autorisés jusqu'à une taille maximale de 5 Mo.</p>
          </form>
<?php
$connect = mysqli_connect('localhost','root','','forum');

$profiledefault = ("https://i.ibb.co/mG6M0f5/empty-profile-picture.jpg"); //variable pour insérer une photo de profil par défaut à l'inscription


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
            if(file_exists("upload/" . $_FILES["photo"]["name"])){
                echo $_FILES["photo"]["name"] . " existe déjà.";
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $_FILES["photo"]["name"]);
                echo "Votre fichier a été téléchargé avec succès.";

                $file_path="upload/" . $_FILES["photo"]["name"];

                //récupérer le chemin du serveur soit avec une super globale SERVER ou le taper en dur


               // "UPDATE utilisateurs SET avatar='$file_path'"; //ajouter id utilisateur

                $requestimg = "UPDATE `utilisateurs` SET `avatar`='$file_path' WHERE login = '$_SESSION[login]'";
                $resultimg = mysqli_query($connect, $requestimg);

                header("location:connexion.php");

            }
        } else{
            echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.";
        }
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
    }
}



?>
