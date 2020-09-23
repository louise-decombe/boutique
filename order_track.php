<?php $page_selected = 'order-track'; ?>

<!DOCTYPE html>
<html>

<head>
    <title>boutique - order_track</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/0mKd0xT/icon-round-fanzine.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style-recap-order.css">
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
        $all_orders = $order->all_order($_SESSION['user']['id_user']);

        ?>
    </header>
    <main>
    <section id="container-profile">
            <nav>
                <li><a  href="profil.php"> <i class="far fa-user-circle"></i>  &nbsp; MES INFORMATIONS</a></li>
                <li><a id="selected_page" href="order_track.php"> <i class="fas fa-shopping-bag"></i> MES COMMANDES</a></li>
                <li><a href="wishlist.php"> <i class="far fa-heart"></i> WHISHLIST</a></li>
                <li><a href="contact-form.php"> <i class="far fa-envelope"></i> NOUS CONTACTER</a></li>
                <li>
                    <form action="index.php" method="post">
                        <input id="deco-profile" name="deco" value="SE DECONNECTER" type="submit"/>
                    </form>
                </li>
            </nav>

            <article id="profile-infos">
                <h2>Mes commandes</h2>
                <section class="treatment-order">
                    <table id="table-order">
				        <thead>
						    <tr>
			  			        <th>Date</td>
			  				    <th>N°commande</td>
							    <th>Quantité</td>
                                <th>Montant</td>
                                <th>Statut</td>
			    		    </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php foreach ($all_orders as $details){ //var_dump($preparation);

                                $status_order = $details->statut_commande;
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
                            ?>
                                <td><?= (new DateTime($details->date_commande))->format('d-m-Y')?></td>
                                <td><a href="order_details.php?id=<?=$details->id_commande?>">#0000<?=$details->id_commande?></a></td>
                                <td><?=$details->nbr_total_articles?></td>
                                <td><?= $formatter->formatCurrency($details->prix_total,'EUR'), PHP_EOL; ?></td>
                                <td><?=$status?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table> 
                </section>
            </article>


        <?php //var_dump($last_order);
              //var_dump($detail_order);
               //var_dump($all_orders);

        ?>


       
    </main>
    <footer>
        <?php include('includes/footer.php'); ?>
    </footer>
</body>
</html>
