<?php
class DB{

	private $host = 'localhost';
	private $username = 'root';
	private $password = '';
	private $database = 'boutique';
	private $db;

//initialisation du constructeur
	public function __construct($host = null, $username = null, $password = null, $database = null){
		if($host != null){
			$this->host = $host;
			$this->username = $username;
			$this->password = $password;
			$this->database = $database;
		}

		try{
			$this->db = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->username, $this->password,
			// on interragit avec la BDD en UTF8 ce qui empêche les problèmes d'accent
			// indique la requête sql à lancer quand on se connecte
			array(
					PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
			//mode d'erreur pour avoir des warning
					PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
				));
		//récupération des erreurs
		}catch(PDOException $e)
		{
			die('<h1>Impossible de se connecter a la BDD</h1>');
		}


	}

//méthode qui permet de faire une requête rapidement, prend en paramètre la requête à faire
// pour faire une requête : $DB->query('SELECT * FROM table')
// par défaut, la méthode est un tableau vide la requête est préparée
	public function query($sql, $data = array()){
		$req =$this->db->prepare($sql);
		$req->execute($data);
//le résultat est retourné sous forme d'objet
		return $req->fetchAll(PDO::FETCH_OBJ);
	}

}
