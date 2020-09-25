<?php
class Admin_orders{

    private $db;

   
    public function __construct($db)
    {
        $this->db = $db;
    }

    // SELECT DE TOUTES LES COMMANDES EN FONCTION DE LEUR STATUT
    public function order_status($status){

        $connexion = $this->db->connectDb();
        $q = $connexion->prepare("SELECT * FROM commande as C
                                  INNER JOIN facture as F
                                  ON C.id_commande = F.id_commande
                                  WHERE statut_commande = $status ORDER by date_commande DESC");
        $q->execute();
        $order_status = $q->fetchAll(PDO::FETCH_OBJ);

        return $order_status;
    }

    // COMPTE TOUTES LES COMMANDES PAR STATUT
    public function count_order($status){

        $connexion = $this->db->connectDb();
        $q= $connexion->prepare("SELECT COUNT(*) FROM commande WHERE statut_commande = $status");
        $q->execute();
        $count_order = $q->fetchAll();

        return $count_order;

    }

    //MODIFICATION DU STATUT DE LA COMMANDE
    public function change_status($id_commande,$status){
        $connexion = $this->db->connectDb();
        $update_s = "UPDATE commande SET statut_commande=:statut_commande WHERE id_commande = $id_commande ";
        $update_status= $connexion -> prepare($update_s);
        $update_status->bindParam(':statut_commande',$status, PDO::PARAM_INT);
        $update_status->execute();
    }

    //ANNULATION D'UNE COMMANDE
    public function order_delete($id_commande, $prix_total){
      
        $connexion = $this->db->connectDb();
        $q = $connexion->prepare("DELETE FROM commande WHERE id_commande = $id_commande");
        $q->execute();

        $q1 = $connexion->prepare("DELETE FROM facture WHERE id_commande = $id_commande");
        $q1->execute();

        $q2 = $connexion->prepare("DELETE FROM detail_commande WHERE id_commande = $id_commande");
        $q2->execute();

        header('location:admin-nad.php');

        //UPDATE LA TABLE TRANSACTION POUR REMBOURSEMENT
        $update_t = "UPDATE transactions SET total_transaction=:total_transaction, date_transaction=NOW() WHERE id_commande = $id_commande ";
        $update_transaction= $connexion -> prepare($update_t);
        $update_transaction->bindParam(':total_transaction',$prix_total, PDO::PARAM_STR);
        $update_transaction->execute();

        //UPDATE LA TABLE STOCK POUR REINTÉGRER L'ARTICLE
    
    }

    //UPDATE LA TABLE STOCK POUR REINTÉGRER UN ARTICLE
    public function update_stock($id_article, $qte_art){
      
        $connexion = $this->db->connectDb();
        $update_s = "UPDATE stock SET nb_articles_stock=:nb_articles_stock, date_transaction=NOW() WHERE id_article = $id_article ";
        $update_stock= $connexion -> prepare($update_s);
        $update_stock->bindParam(':nb_articles_stock',$qte_art, PDO::PARAM_STR);
        $update_transaction->execute();
    }


}
