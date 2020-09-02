<?php
class Admin_options{

    private $db;


    public function __construct($db)
    {
        $this->db = $db;
    }

    // AJOUT D'UNE NEWS EN INDEX
    public function index_news($text_news){

        $connexion = $this->db->connectDb();
        $q = $connexion->prepare("INSERT INTO news_index(text_news, date_news) VALUES (:text_news, NOW())");
        $q->bindParam(':text_news', $text_news, PDO::PARAM_STR);
        $q->execute();
    }

    // AFFICHAGE D'UNE NEWS EN INDEX
    public function news(){

        $connexion = $this->db->connectDb();
        $q = $connexion->prepare("SELECT * FROM news_index ORDER by date_news DESC");
        $q->execute();

        $news = $q->fetch();

        return $news;
    }

    // AFFICHAGE D'UNE CITATION EN INDEX
    public function quote(){

        $connexion = $this->db->connectDb();
        $q = $connexion->prepare("SELECT nom_article,auteur_article,citation_article FROM article ORDER by date_registration DESC");
        $q->execute();

        $quote = $q->fetch();

        return $quote;
    }

}
