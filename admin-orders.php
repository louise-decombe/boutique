<?php
ob_start();
$page_selected = 'admin-orders';?>

<!DOCTYPE html>
<html>
<head>
    <title>boutique - admin-orders</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/0mKd0xT/icon-round-fanzine.png">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style-admin-general.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</head>

<body>
    <header>
        <?php
        include("includes/header.php");

          if (isset($_SESSION['user'])) {
        if($_SESSION['user']['is_admin'] == 1)

             {
        require 'class/admin.php';
        $admin_orders = new Admin_orders($db);
        $formatter = new NumberFormatter('fr_FR', NumberFormatter::CURRENCY);

        $admin_validation = $admin_orders->order_status(1);
        $admin_preparation = $admin_orders->order_status(2);
        $admin_livraison = $admin_orders->order_status(3);
        $admin_retours = $admin_orders->order_status(4);
        $admin_terminee = $admin_orders->order_status(5);
        $admin_count_validation = $admin_orders->count_order(1);
        $admin_count_preparation = $admin_orders->count_order(2);
        $admin_count_livraison = $admin_orders->count_order(3);
        $admin_count_retour = $admin_orders->count_order(4);
        //var_dump($admin_livraison);
        ?>
    </header>
    <main>
        <section id="nav-admin-pages">
        <?php require("admin_nav.php"); ?>
        </section>

        <section id="container-treatment">
            <nav>
                <li>
                    <form action="" method="post">
                        <input class="button-category" name="validation" value="A VALIDER" type="submit"/>
                    </form>
                </li>
                <li>
                    <form action="" method="post">
                        <input class="button-category" name="preparation" value="PREPARATION" type="submit"/>
                    </form>
                </li>
                <li>
                    <form action="" method="post">
                        <input class="button-category"  name="livraison" value="LIVRAISON" type="submit"/>
                    </form>
                </li>
                <li>
                    <form action="" method="post">
                        <input class="button-category" name="retour" value="RETOURS" type="submit"/>
                    </form>
                </li>
                <li>
                    <form action="" method="post">
                        <input class="button-category" name="terminee" value="HISTORIQUE" type="submit"/>
                    </form>
                </li>
                <li>
                    <form action="" method="post">
                        <input class="disconnect" name="deco" value="SE DECONNECTER" type="submit"/>
                    </form>
                </li>
            </nav>

            <article id="profile-infos">
                <h1>TABLEAU DE BORD - COMMANDES</h1>
                    <ul>
                        <li> vous avez <span class="important-info"><?= $admin_count_validation[0][0]?></span> commandes en attente de validation</li>
                        <li> vous avez <span class="important-info"><?= $admin_count_preparation[0][0]?></span> commandes en cours de préparation</li>
                        <li> vous avez <span class="important-info"><?= $admin_count_livraison[0][0]?></span> commandes en cours de livraison</li>
                        <li> vous avez <span class="important-info"><?= $admin_count_retour[0][0]?></span> retours à traiter</li>
                    </ul>
            </article>
        </section>
        <?php if(isset($_POST['preparation'])){?>
        <section class="treatment-order">
            <a href="admin-nad.php">x</a>
            <h2>EN COURS DE PRÉPARATION</h2>
                <table>
				    <thead>
						<tr>
			  			    <th>id_commande</td>
			  				<th>id_utilisateur</td>
							<th>N°facture</td>
                            <th>prix total</td>
                            <th>Nb d'articles</td>
                            <th>date commande</td>
                            <th>statut</td>
                            <th>modifier</td>
			    		</tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php foreach ($admin_preparation as $preparation){ //var_dump($preparation);?>
                            <td><a href="order_details.php?id=<?=$preparation->id_commande?>"><?=$preparation->id_commande?></a></td>
                            <td><?=$preparation->id_utilisateur?></td>
                            <td><?=$preparation->id_facture?></td>
                            <td><?= $formatter->formatCurrency($preparation->prix_total,'EUR'), PHP_EOL; ?></td>
                            <td><?=$preparation->nbr_total_articles?></td>
                            <td><?= (new DateTime($preparation->date_commande))->format('d-m-Y')?></td>
                            <td><?=$preparation->statut_commande?></td>
                            <td><a  href="order_details.php?id=<?=$preparation->id_commande?>">modifier</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
        </section>
        <?php } ?>
        <?php if(isset($_POST['livraison'])){?>
        <section class="treatment-order">
            <a href="admin-nad.php">x</a>
            <h2>EN COURS DE LIVRAISON</h2>
                <table>
				    <thead>
						<tr>
			  			    <th>id_commande</td>
			  				<th>id_utilisateur</td>
							<th>N°facture</td>
                            <th>prix total</td>
                            <th>Nb d'articles</td>
                            <th>date commande</td>
                            <th>statut</td>
                            <th>modifier</td>
			    		</tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php foreach ($admin_livraison as $livraison){ //var_dump($preparation);?>
                            <td><a href="order_details.php?id=<?=$livraison->id_commande?>"><?=$livraison->id_commande?></a></td>
                            <td><?=$livraison->id_utilisateur?></td>
                            <td><?=$livraison->id_facture?></td>
                            <td><?= $formatter->formatCurrency($livraison->prix_total,'EUR'), PHP_EOL; ?></td>
                            <td><?=$livraison->nbr_total_articles?></td>
                            <td><?= (new DateTime($livraison->date_commande))->format('d-m-Y')?></td>
                            <td><?=$livraison->statut_commande?></td>
                            <td><a href="order_details.php?id=<?=$livraison->id_commande?>">modifier</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
        </section>
        <?php } ?>
        <?php if(isset($_POST['retour'])){?>
        <section class="treatment-order">
            <a href="admin-nad.php">x</a>
            <h2>DEMANDE DE RETOUR</h2>
                <table>
				    <thead>
						<tr>
			  			    <th>id_commande</td>
			  				<th>id_utilisateur</td>
							<th>N°facture</td>
                            <th>prix total</td>
                            <th>Nb d'articles</td>
                            <th>date commande</td>
                            <th>statut</td>
                            <th>modifier</td>
			    		</tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php foreach ($admin_retours as $retour){ //var_dump($preparation);?>
                            <td><a href="order_details.php?id=<?=$retour->id_commande?>"><?=$retour->id_commande?></a></td>
                            <td><?=$retour->id_utilisateur?></td>
                            <td><?=$retour->id_facture?></td>
                            <td><?= $formatter->formatCurrency($retour->prix_total,'EUR'), PHP_EOL; ?></td>
                            <td><?=$retour->nbr_total_articles?></td>
                            <td><?= (new DateTime($retour->date_commande))->format('d-m-Y')?></td>
                            <td><?=$retour->statut_commande?></td>
                            <td><a href="order_details.php?id=<?=$retour->id_commande?>">modifier</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
        </section>
        <?php } ?>
        <?php if(isset($_POST['terminee'])){?>
        <section class="treatment-order">
            <a href="admin-nad.php">x</a>
            <h2>HISTORIQUE DES COMMANDES TRAITÉES</h2>
                <table>
				    <thead>
						<tr>
			  			    <th>id_commande</td>
			  				<th>id_utilisateur</td>
							<th>N°facture</td>
                            <th>prix total</td>
                            <th>Nb d'articles</td>
                            <th>date commande</td>
                            <th>statut</td>
                            <th>modifier</td>
			    		</tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php foreach ($admin_terminee as $terminee){ //var_dump($preparation);?>
                            <td><a href="order_details.php?id=<?=$terminee->id_commande?>"><?=$terminee->id_commande?></a></td>
                            <td><?=$terminee->id_utilisateur?></td>
                            <td><?=$terminee->id_facture?></td>
                            <td><?=$formatter->formatCurrency($terminee->prix_total,'EUR'), PHP_EOL; ?></td>
                            <td><?=$terminee->nbr_total_articles?></td>
                            <td><?= (new DateTime($terminee->date_commande))->format('d-m-Y')?></td>
                            <td><?=$terminee->statut_commande?></td>
                            <td><a href="order_details.php?id=<?=$terminee->id_commande?>">modifier</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
        </section>
        <?php } ?>
        <section class="treatment-order">
            <h2>LISTE DES COMMANDES À VALIDER</h2>
                <table>
				    <thead>
						<tr>
			  			    <th>id_commande</td>
			  				<th>id_utilisateur</td>
							<th>N°facture</td>
                            <th>prix total</td>
                            <th>Nb d'articles</td>
                            <th>date commande</td>
                            <th>statut</td>
                            <th>modifier</td>
                            <th>supp.</td>
			    		</tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php foreach ($admin_validation as $validation){ //var_dump($validation);?>
                            <td><a id="order-nb" href="order_details.php?id=<?=$validation->id_commande?>"><?=$validation->id_commande?></a></td>
                            <td><?=$validation->id_utilisateur?></td>
                            <td><?=$validation->id_facture?></td>
                            <td><?= $formatter->formatCurrency($validation->prix_total,'EUR'), PHP_EOL; ?></td>
                            <td><?=$validation->nbr_total_articles?></td>
                            <td><?= (new DateTime($validation->date_commande))->format('d-m-Y')?></td>
                            <td><?=$validation->statut_commande?></td>
                            <td><a id="order-nb" href="order_details.php?id=<?=$validation->id_commande?>">modifier</a></td>
                            <td>
                                <form method='post' action =''>
                                    <input class='deletebutton' type='submit' value='<?=$validation->id_commande?>' name='delete'/>
                                </form>
                                <?php if(isset($_POST['delete']) && $_POST['delete'] == $validation->id_commande){
                                    $id_order = $validation->id_commande;
                                    $price_return = ('-'.$validation->prix_total);
                                    $order_delete = $admin_orders->order_delete($id_order, $price_return);
                                    }
                                ?>
                            </td>


                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
        </section>
    </main>
    <footer>
        <?php include("includes/footer.php"); ?>
    </footer>
</body>
</html>
<?php
ob_end_flush();
}
}
?>
