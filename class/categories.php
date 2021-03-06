<?php

class Categorie{

public $db;

public function __construct($db)
{
	$this->db = $db;
}

// SELECT 4 PREMIÈRE CATEGORIES POUR LE FOOTER
public function cat()
    {
        $connexion = $this->db->connectDb();
        $q = $connexion->prepare("SELECT * FROM categorie ORDER by id_categorie ASC limit 4");
        $q->execute();
		$categories = $q->fetchAll();

		foreach ($categories as $cat){
			$name_categorie = $cat["nom_categorie"];
			$id_categorie = $cat["id_categorie"];
			echo '<a href="category.php?id='.$id_categorie.'">' .$name_categorie.'</a>';

			}
		
		return $categories;       
	}


// SELECT 4 CATEGORIES ET LES SOUS-CATEGORIES ASSOCIÉES POUR LE HEADER
public function categories()
    {
        $connexion = $this->db->connectDb();
        $q = $connexion->prepare("SELECT * FROM categorie ORDER by id_categorie ASC limit 4");
        $q->execute();
		$categories = $q->fetchAll();

		foreach ($categories as $cat){
			$name_categorie = $cat["nom_categorie"];
			$id_categorie = $cat["id_categorie"];
			echo '<li class="dropdown-menu"><a href="category.php?id='.$id_categorie.'">' .$name_categorie.'</a><ul class ="menu-area">';
			echo '<a id="all_categories" href="category.php">voir toutes les catégories</a>';

			
        	$q1 = $connexion->prepare("SELECT nom_sous_categorie, id_sous_categorie FROM sous_categorie WHERE id_categorie = $id_categorie");
        	$q1->execute();
			$sub_categories = $q1->fetchAll();
			//var_dump($sub_categories);

			foreach ($sub_categories as $sub_cat){
				$name_sous_categorie = $sub_cat["nom_sous_categorie"];
				$id_sous_categorie = $sub_cat["id_sous_categorie"];
				echo '<ul><li><a href="subcategory.php?id='.$id_sous_categorie.'&category_name='.$name_categorie.'/subcategory=' .$name_sous_categorie. '">'.$name_sous_categorie.'</a></li></ul>';
			}
			echo '</ul></li>'; 
		}
		
		return $categories + $sub_categories;       
	}

// SELECT SOUS-CATEGORIES + CATEGORIES ASSOCIÉES
public function sub_categories($id)
    {
        $connexion = $this->db->connectDb();
        $q1 = $connexion->prepare("SELECT sous_categorie.nom_sous_categorie, sous_categorie.id_sous_categorie, categorie.nom_categorie, categorie.id_categorie FROM sous_categorie INNER JOIN categorie ON sous_categorie.id_categorie = categorie.id_categorie ");
        $q1->execute();
		$sub_categories = $q1->fetchAll();

		foreach ($sub_categories as $sub_cat){
			$name_categorie = $sub_cat['nom_categorie'];
			$id_categorie = $sub_cat["id_categorie"];
			$name_sous_categorie = $sub_cat["nom_sous_categorie"];
			$id_sous_categorie = $sub_cat["id_sous_categorie"];
			echo '<li><a href="category.php?id='.$id_categorie.'&category_name='.$name_categorie.'/subcategory=' .$name_sous_categorie. '">'.$name_sous_categorie.'</a></li>';
		}

		return $sub_categories;       
	}


// SELECT LA CATEGORIE ASSOCIÉE À UN ARTICLE
public function categorie_article($id_sub)
    {
        $connexion = $this->db->connectDb();
        $q = $connexion->prepare("SELECT * FROM article as A INNER JOIN image_article as I ON A.id_article = I.id_article WHERE A.id_sous_categorie = $id_sub order by A.id_article LIMIT 8");
        $q->execute();
		$categorie_article = $q->fetchAll();
		
		
		return $categorie_article;       
	}

// SELECT TOUTES LES CATÉGORIES POUR LA PAGE CATEGORIE + LES SOUS CATÉGORIES CORRESPONDANTES À CHAQUE CATÉGORIE
public function all_categories()
    {
        $connexion = $this->db->connectDb();
        $q = $connexion->prepare("SELECT * FROM categorie ORDER by id_categorie ");
        $q->execute();
		$categories = $q->fetchAll();

		foreach ($categories as $cat){
			$name_categorie = $cat["nom_categorie"];
			$id_categorie = $cat["id_categorie"];
			echo '<section id="box-category"><a id="name-category" href="category.php?id='.$id_categorie.'">' .$name_categorie.'</a>';

        	$q1 = $connexion->prepare("SELECT nom_sous_categorie, id_sous_categorie FROM sous_categorie WHERE id_categorie = $id_categorie");
        	$q1->execute();
			$sub_categories = $q1->fetchAll();
			//var_dump($sub_categories);

			foreach ($sub_categories as $sub_cat){
				$name_sous_categorie = $sub_cat["nom_sous_categorie"];
				$id_sous_categorie = $sub_cat["id_sous_categorie"];
				echo '<a id="name_sub_category" href="subcategory.php?id='.$id_sous_categorie.'&category_name='.$name_categorie.'/subcategory=' .$name_sous_categorie. '">'.$name_sous_categorie.' &nbsp;<i class="fas fa-arrow-right"></i></a>';
			}

			echo '</section>';
			
		}
		
		return $categories + $sub_categories;       
	}


// SELECT LES NOUVEAUTÉS EN INDEX
	public function new()
    {
        $connexion = $this->db->connectDb();
        $q1 = $connexion->prepare('SELECT article.nom_article, article.id_article, article.prix_article, article.auteur_article, image_article.chemin FROM article INNER JOIN image_article ON article.id_article = image_article.id_article WHERE MONTH(date_registration) = MONTH(NOW())ORDER by date_registration DESC limit 8');
        $q1->execute();
		$new_in = $q1->fetchall();

		return $new_in;       
	}


// SELECT TOUTES LES INFOS D'UN ARTICLE DANS LES DIFFÉRENTES TABLES
	public function article_infos($id_art)
    {
        $connexion = $this->db->connectDb();
        $q = $connexion->prepare("SELECT * FROM article as A 
								  INNER JOIN image_article as I 
								  ON A.id_article = I.id_article
								  INNER JOIN categorie as C
								  ON A.id_categorie = C.id_categorie
								  INNER JOIN sous_categorie as S
								  ON A.id_sous_categorie = S.id_sous_categorie 
								  INNER JOIN stock as T
								  ON A.id_article = T.id_article
								  WHERE A.id_article =' ".$id_art."'");
        $q->execute();
		$item = ($q->fetch());

		//var_dump($item);
		return $item;       
	}

// SELECT ARTICLES SIMILAIRES
	public function similar_article($id_sous_categorie, $id_item)
    {
        $connexion = $this->db->connectDb();
        $q = $connexion->prepare("SELECT * FROM article as A 
								  INNER JOIN image_article as I 
								  ON A.id_article = I.id_article
								  INNER JOIN categorie as C
								  ON A.id_categorie = C.id_categorie
								  INNER JOIN sous_categorie as S
								  ON A.id_sous_categorie = S.id_sous_categorie 
								  WHERE A.id_sous_categorie =' ".$id_sous_categorie."'
								  ORDER by A.date_registration DESC limit 4");
        $q->execute();
		$similar = ($q->fetchAll());

		//var_dump($similar);
		return $similar;       
	}


	// SELECT LA CATEGORIE ASSOCIÉE À UN ARTICLE
	public function count_article($id_sub){

	// counting total number of posts
	$connexion = $this->db->connectDb();
	$q = $connexion->prepare("SELECT count(*) FROM article as allcount INNER JOIN image_article as I ON allcount.id_article = I.id_article WHERE allcount.id_sous_categorie = $id_sub");
	$q->execute();
	$count_article = $q->fetchAll();


	return $count_article;       
	}

	public function select_articles($id_sub){

	$connexion = $this->db->connectDb();
	$q = $connexion->prepare("SELECT * FROM article as A INNER JOIN image_article as I ON A.id_article = I.id_article WHERE A.id_sous_categorie = $id_sub ORDER by A.date_ajout DESC limit 2");
	$q->execute();
	$select_articles = $q->fetchAll();


	return $select_articles;  
	}


}
?>

