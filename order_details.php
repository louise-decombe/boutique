<?php $page_selected = 'order_details'; ?>

<!DOCTYPE html>
<html>

<head>
    <title>boutique - order_details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/0mKd0xT/icon-round-fanzine.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style-order-details.css">
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</head>

<body>
    <header>
        <?php 
        include("includes/header.php");
        require 'class/order.php';
        require 'class/admin.php';
        $order = new Order($db);
        $admin_changes = new Admin_orders($db);
        $formatter = new NumberFormatter('fr_FR', NumberFormatter::CURRENCY);
        $detail_order = $order->recap($_GET['id']);
        $detail_articles = $order->detail_order($_GET['id']);
        //$detail_article = $category->article_infos();

        $status_order = $detail_order[0]['statut_commande'];
        if ($status_order == 1){
            $status = 'validée';
        }else if($status_order == 2){
        $status = 'en préparation';
        }else if($status_order == 2){
        $status = 'en cours de livraison';
        }else if($status_order == 4){
        $status = 'demande de retoour en cours';
        }else if($status_order == 5){
        $status = 'terminée';
        }
        $delivery_choice = $detail_order[0]['id_livraison'];
        if ($delivery_choice == 1){
            $delivery = 'Point-relai';
        }else if($delivery_choice == 2){
            $delivery  = 'Colissimo';
        }else if($delivery_choice == 3){
            $delivery  = 'Chronopost';
        } 
        ?>
    </header>
    <main>
        <section id="header-order-details">
            <h1>DETAILS COMMANDE #0000<?= $detail_order[0]['id_commande'] ?></h1>
        </section>
        <section id="container-order-details">
            <section id="before-details"><a href="javascript:history.back()"><i class="fas fa-arrow-circle-left"></i></a></section>
           
            <section id="sub-details-order">
                <article id="infos-details-order">
                    <ul>
                        <li>date de commande : <?= (new DateTime($detail_order[0]['date_commande']))->format('d-m-Y') ?></li>
                        <li>adresse de facturation : <?= $detail_order[0]['adresse_facturation'] ?></li>
                        <li>statut de commande : <?= $status ?></li>
                        <li>Nombre d'articles : <?= $detail_order[0]['nbr_total_articles'] ?></li>
                        <li>Prix TTC: <?= $formatter->formatCurrency($detail_order[0]['prix_total'],'EUR'), PHP_EOL; ?></li>
                        <li>N° facture : #0000<?= $detail_order[0]['id_facture'] ?></li>
                        <li>Mode de livraison : <?= $delivery ?></li>
                        <li><?php //var_dump($detail_order); ?></li>
                  

                    <hr>
             
                    <?php foreach ($detail_articles as $details){ //var_dump($details); ?>
                        <li>titre article : <?=$details -> titre_article ?> ,qté : <?=$details -> quantite_article ?></li>
                    <?php } ?>
                    </ul>
          
                </article>
            </section>
            
            <?php if(isset ($_SESSION['user']) && ($_SESSION['user']['is_admin']) == 1){ ?>

                <form id="form-status-order" method="POST" action="">
                                    <select name="statut" id="select">
                                        <option value="">--sélectionner le statut de la commande--</option>
                                        <option value="1">validée</option>
                                        <option value="2">en cours de préparation</option>
                                        <option value="3">envoyée</option>
                                        <option value="4">retour</option>
                                        <option value="5">clôturée</option>
                                    </select>
                                    <button type="submit" name="submit">modifier le statut </button>
                </form>
           
            <?php } 

                if(isset ($_POST['submit'])){
                var_dump($_POST['statut']);
                $statut_order = $admin_changes->change_status($detail_order[0]['id_commande'], $_POST['statut']);
                echo '<a href="javascript:history.go(-2)">retour aux commandes</a>';
                }
            ?>
            
        </section>
    </main>
    <footer>
        <?php include('includes/footer.php'); ?>
    </footer>
</body>
</html>
