<?php
class Order{

    private $db;
   
    
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
		$delivery = $q->fetchAll(PDO::FETCH_OBJ);
		
		return $delivery; 
			
    }
    
    // ESTIMATION PRIX TOTAL AVANT VALIDATION COMMANDE
    public function estimation($total_panier, $default_delivery) {

        $calcul = $total_panier + $default_delivery;
        
        return $calcul;
    }

    public function register_order( $firstname, $lastname, $address, $delivery_choice, $nb_article, $sous_total, $prix_total)
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
        //$address_required = preg_match("~[0-9]{5}~", $address, $matches);
        //if (!$address_required) {
            //$errors[] = "Le code postal doit:<br>- Comporter 5 chiffres.";
        //}
      
        //date
        date_default_timezone_set("Europe/Paris");

        if (empty($firstname) or empty($lastname) or empty($address)) {
            $errors[] = "Tous les champs doivent être remplis.";
        }

        if (empty($errors)) {

            $id_user = $_SESSION['user']['id_user'];
            //var_dump($_POST['article']);

            // ENREGISTREMENT DANS LA TABLE COMMANDE
            $default_status_order = 1;
            $q = $connexion->prepare(
                "INSERT INTO commande (id_utilisateur, date_commande, statut_commande) VALUES (:id_utilisateur, NOW(),:statut_commande)"
            );
            //var_dump($q);
            $q->bindParam(':id_utilisateur', $id_user, PDO::PARAM_INT);
            $q->bindParam(':statut_commande', $default_status_order, PDO::PARAM_INT);
            $q->execute();
            $id_commande = $connexion->lastInsertId();

             // ENREGISTREMENT DANS LA TABLE FACTURE
            $q2 = $connexion->prepare(
                "INSERT INTO facture (id_commande, nbr_total_articles, prix_total_articles, prix_livraison, adresse_facturation, prix_total, id_utilisateur, date_facturation) VALUES (:id_commande, :nbr_total_articles, :prix_total_articles, :prix_livraison, :adresse_facturation, :prix_total, :id_utilisateur, NOW())"
            );
            $q2->bindParam(':id_commande', $id_commande, PDO::PARAM_INT);
            $q2->bindParam(':nbr_total_articles', $nb_article, PDO::PARAM_INT);
            $q2->bindParam(':prix_total_articles', $sous_total, PDO::PARAM_STR);
            $q2->bindParam(':prix_livraison', $delivery_choice, PDO::PARAM_STR);
            $q2->bindParam(':adresse_facturation', $address, PDO::PARAM_STR);
            $q2->bindParam(':prix_total', $prix_total, PDO::PARAM_STR);
            $q2->bindParam(':id_utilisateur', $id_user, PDO::PARAM_INT);
            $q2->execute();

             // ENREGISTREMENT DANS LA TABLE DETAIL_COMMANDE
            //var_dump($_POST['article']);
            foreach ($_POST['article'] as $cle => $value){
                 //var_dump($valeur['titre']);
                //var_dump($cle);

                $id_article = $value['id'];
                $article = $value['titre'];
                $qte_article = $value['qte'];

                $q1 = $connexion->prepare(
                    "INSERT INTO detail_commande (id_article, titre_article, quantite_article, id_commande) VALUES (:id_article, :titre_article, :quantite_article, :id_commande)"
                );
                $q1->bindParam(':id_article', $id_article, PDO::PARAM_INT);
                $q1->bindParam(':titre_article', $article, PDO::PARAM_STR);
                $q1->bindParam(':quantite_article', $qte_article, PDO::PARAM_INT);
                $q1->bindParam(':id_commande', $id_commande, PDO::PARAM_INT);
                $q1->execute();
  
            }

            // CHECK QTÉ EN STOCK PUIS ENREGISTREMENT DU NOUVEAU STOCK DANS LA TABLE STOCK
            $qte_check = $connexion->prepare("SELECT detail_commande.id_commande, detail_commande.id_article, detail_commande.quantite_article, stock.nb_articles_stock 
                                              FROM detail_commande 
                                              INNER JOIN stock 
                                              ON detail_commande.id_article = stock.id_article 
                                              WHERE detail_commande.id_commande = $id_commande");
            $qte_check->execute();
            $q_check = $qte_check->fetchAll();
            //var_dump($q_check);

            foreach ($q_check as $key => $q_checks){
                //var_dump($q_checks);
                $id = $q_checks['id_article'];
                $before_stock = $q_checks['nb_articles_stock'];
                $subs_stock = $q_checks['quantite_article'];
                $new_stock = $before_stock - $subs_stock;
                var_dump($new_stock);

                $update_a = "UPDATE stock SET nb_articles_stock=:nb_articles_stock, date_check_stock= NOW() WHERE id_article = $id";
                $update_article = $connexion -> prepare($update_a);
                $update_article->bindParam(':nb_articles_stock', $new_stock, PDO::PARAM_INT);
                $update_article->execute();
            }

            header('location:order_confirmation.php');
        
        }else {
            $message = new messages($errors);
            echo $message->renderMessage();
        }
    }

}
