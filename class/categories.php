<?php

class Categorie{

public $db;

public function __construct($db)
{
	$this->db = $db;
}

public function categories()
    {
        $connexion = $this->db->connectDb();
        $q = $connexion->prepare("SELECT * FROM categorie");
        $q->execute();
		$categories = $q->fetchAll();

		foreach ($categories as $cat){
			$name_categorie = $cat["nom_categorie"];
			$id_categorie = $cat["id_categorie"];
			echo '<li><a href="category.php?id='.$id_categorie.'">' .$name_categorie. '</a></li>';
		}
	
		return $categories;       
    }

}
?>
