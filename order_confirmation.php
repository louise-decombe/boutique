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
    <link rel="stylesheet" type="text/css" href="css/style-order.css">
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
        var_dump($last_order);
        var_dump($detail_order);
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
            <section id="sub-confirmation">
                <h1>confirmation de paiement d'un montant de <?= $formatter->formatCurrency($last_order->prix_total_articles,'EUR'), PHP_EOL;?></h1>
                <article>
                    <span>Merci pour votre commande #0000 <?= $last_order->id_commande ?> @ <?= $_SESSION['user']['lastname']?></span>
                    <ul>
                        <?php foreach ($detail_order as $details){ ?>
                        <li>titre article : <?=$details -> titre_article ?>, QTÉ <?=$details -> quantite_article ?></li>
                        <?php } ?>
                        <li>Nbre d'articles commandés : <?= $last_order->nbr_total_articles?></li>
                    </ul>
                </article>
                <p> Vous allez prochainement recevoir un email de confirmation </p>
                <a href="profil.php">consultez votre profil pour suivre l'avancement de votre commande</a>
                <a href="index1.php">retour à l'accueil de notre site</a>

            </section>
        </section>
    </main>
    <footer>
        <?php include('includes/footer.php'); ?>
    </footer>
</body>
</html>

