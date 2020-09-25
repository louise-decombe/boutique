<?php
class Stock{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }


    // AFFICHAGE D'UNE CITATION EN INDEX
    public function all_stock(){

        $connexion = $this->db->connectDb();
        $q = $connexion->prepare("SELECT * FROM stock as S
                                  INNER JOIN article as A
                                  ON S.id_article = A.id_article");
        $q->execute();
        $stock = $q->fetchAll();
        return $stock;
    }

     //UPDATE LA TABLE STOCK POUR REINTÉGRER UN ARTICLE
     public function update_stock($id_article, $qte_art){
      
        $connexion = $this->db->connectDb();
        $update_s = "UPDATE stock SET nb_articles_stock=:nb_articles_stock, date_check_stock=NOW() WHERE id_article = $id_article ";
        $update_stock= $connexion -> prepare($update_s);
        $update_stock->bindParam(':nb_articles_stock',$qte_art, PDO::PARAM_STR);
        $update_stock->execute();
    }

}
