<?php $page_selected = 'order-confirmation'; ?>

<!DOCTYPE html>
<html>

<head>
    <title>boutique - order_confirmation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/0mKd0xT/icon-round-fanzine.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style-recap-order-confirmation.css">
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</head>

<body>
    <header>
        <?php 
        include("includes/header.php");
        require 'class/order.php';
        $order = new Order($db);
        $formatter = new NumberFormatter('fr_FR', NumberFormatter::CURRENCY);
        $last_order = $order->recap_order($_SESSION['user']['id_user']);
        $detail_order = $order->detail_order($last_order->id_commande );
        $delivery = $order->delivery_id($last_order->prix_livraison);
        ?>
    </header>
    <main>
        <section id="container-order">
		    <nav>
	   		    <ul>
	   			    <li>1 - mon panier</li>
				    <li> 2 - livraison & paiement </b></li>
				    <li><b> 3 - confirmation <b></li>
	   		    </ul>
            </nav>
        </section>
        
        <section id="sub-confirmation">
            <section id="header-order-details">
                <h1>confirmation de paiement d'un montant de <?= $formatter->formatCurrency($last_order->prix_total,'EUR'), PHP_EOL;?></h1>
            </section>
             
            <section id="sub-details-order">
                <article id="infos-details-order">
                    
                    <h2>Merci pour votre commande #0000 <?= $last_order->id_commande ?> @ <?= $_SESSION['user']['lastname']?></h2>
                    <h3> votre commande en date du <td><?= (new DateTime($last_order->date_commande))->format('d-m-Y')?></td> a bien été prise en compte</h3>

                    <article id="infos-box1">
                        <ul>
                            <li>prix total : <?= $formatter->formatCurrency($last_order->prix_total_articles,'EUR'), PHP_EOL;?></li>
                            <li>frais de livraison : <?= $formatter->formatCurrency($last_order->prix_livraison,'EUR'), PHP_EOL;?><li>
                            <li>Nbre d'articles commandés : <?= $last_order->nbr_total_articles?></li>
                            <li>Mode de livraison : <?= $delivery['nom_livraison'] ?></li>
                        </ul>
                    </article>
                    </hr>
                    <article id="infos-box2">
                        <h4><b>Récapitulatif de commande</b></h4>
                        <div id="infos-box2-details">
                        <ul>
                        <?php foreach ($detail_order as $details){ 
                            $infos_article = $category->article_infos($details -> id_article); //var_dump($infos_article); 
                        ?>
                            <li><?=$details -> titre_article ?></li>
                            <li>quantité <?=$details -> quantite_article ?></li>
                            <li>auteur : <?= $infos_article['auteur_article']?></li>
                            <li>editions : <?= $infos_article['editions_article']?></li>
                            <li><?= $infos_article['nb_pages']?> pages</li>
                        </ul>
                        <div><img id="recap-img" src="<?= $infos_article['chemin']?>"></div>
                        <?php } ?>
                        </div>
                    <article>
    
                </article>
                
            </section>
            <section id="link-confirmation-message">
            <p> Vous allez prochainement recevoir un email de confirmation </p>
                <a href="profil.php">consultez votre profil pour suivre l'avancement de votre commande</a>
                <a href="index1.php">retour à l'accueil de notre site</a>
            </section>
        </section>

        <?php //var_dump($last_order);
              //var_dump($detail_order);
        ?>
       
    </main>
    <footer>
        <?php include('includes/footer.php'); ?>
    </footer>
</body>
</html>
