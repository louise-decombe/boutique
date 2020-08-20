<?php
class Order{

    private $db;
    public $firstname;
    public $lastname;
    public $address;
    public $delivery;
    public $date_registration;
    
    public function __construct($db)
    {
        $this->db = $db;
    }

    // AFFICHAGE DE L'OPTION DE LIVRAISON PAR DÉFAUT AVANT LA VALIDATION DE LA COMMANDE (page panier)
	public function default_delivery(){
        $connexion = $this->db->connectDb();
        $q = $connexion->prepare("SELECT * FROM livraison ORDER by prix_livraison ASC LIMIT 1");
        $q->execute();
		$delivery = $q->fetchAll();

		$name_delivery = $delivery[0]['nom_livraison'];
        $id_delivery = $delivery[0]['id_livraison'];
        $prix_delivery = $delivery[0]['prix_livraison'];

        echo  $prix_delivery.'0';
        
		return $delivery;
	}


    // AFFICHAGE DES OPTIONS DE LIVRAISON POUR LA VALIDATION DE LA COMMANDE
	public function delivery(){
        $connexion = $this->db->connectDb();
        $q = $connexion->prepare("SELECT * FROM livraison ORDER by prix_livraison ASC ");
        $q->execute();
		$delivery = $q->fetchAll();

		foreach ($delivery as $deliver){
			$name_delivery = $deliver["nom_livraison"];
            $id_delivery = $deliver["id_livraison"];
            $prix_delivery = $deliver["prix_livraison"];

            echo  '<input type="radio" name="delivery" id="'.$name_delivery.'" value="'.$name_delivery.'">
                   <label for="'.$name_delivery.'">'.$name_delivery.'</label>';
          
			}
		
		return $delivery; 
			
    }
    
    // ESTIMATION PRIX TOTAL AVANT VALIDATION COMMANDE
    public function estimation($total_panier, $default_delivery) {

        $calcul = $total_panier + $default_delivery;
        
        return $calcul;
    }

    public function register_order( $firstname, $lastname, $address, $delivery)
    {
        $connexion = $this->db->connectDb();

         //firstname
         $firstname_required = preg_match("/^(?=.*[A-Za-z]$)[A-Za-z][A-Za-z\-]{2,19}$/", $firstname);
         if (!$firstname_required) {
             $errors[] = "Le prénom doit :<br>- Comporter entre 3 et 19 caractères.<br>- Commencer et finir par une lettre.<br>- Ne contenir aucun caractère spécial (excepté -).";
         }

        //lastname
        $lastname_required = preg_match("/^(?=.*[A-Za-z]$)([A-Za-z]{2,25}[\s]?[A-Za-z]{1,25})$/", $lastname);
        if (!$lastname_required) {
            $errors[] = "Le nom doit:<br>- Comporter entre 3 et 50 caractètres.<br>- Commencer et finir par une lettre.<br>- Ne contenir aucun caractère spécial (excepté un espace).";
        }

        //address
        $address_required = preg_match(
            "/^(?=.*?[A-Z]{1,})(?=.*?[a-z]{1,})(?=.*?[0-9]{1,})(?=.*?[\W]{1,}).{8,20}$/",
            $address
        );
        if (!$address_required) {
            $errors[] = "L'adresse doit contenir:<br>- Entre 8 et 20 caractères<br>- Au moins 1 caractère spécial<br>- Au moins 1 majuscule et 1 minuscule<br>- Au moins un chiffre.";
        }
      
        //date
        date_default_timezone_set("Europe/Paris");

        if (empty($firstname) or empty($lastname) or empty($address) or empty($delivery)) {
            $errors[] = "Tous les champs doivent être remplis.";
        }

        if (empty($errors)) {
            $q = $connexion->prepare(
                "INSERT INTO commande (nom_article, prix_article, id_utilisateur, date_commande) VALUES (:nom_article,:prix_article,:id_utilisateur,:date_commande)"
            );
            var_dump($q);
            $q->bindParam(':nom_article', $nom_article, PDO::PARAM_STR);
            $q->bindParam(':nom', $prix_article, PDO::PARAM_STR);
            $q->bindParam(':delivery', $id_utilisateur, PDO::PARAM_STR);
            $q->bindValue(':date_registration', date("Y-m-d H:i:s"), PDO::PARAM_STR);
            $q->execute();

            $q1 = $connexion->prepare(
                "INSERT INTO facture (id_commande, nbr_total_articles, prix_total_articles, id_livraison, prix_livraison) VALUES ()"
            );
            var_dump($q);
            
        }else {
            $message = new messages($errors);
            echo $message->renderMessage();
        }
    }

}
