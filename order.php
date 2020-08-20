<?php $page_selected = 'order'; ?>

<!DOCTYPE html>
<html>

<head>
    <title>boutique - order</title>
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

        if (isset($_POST['validation_paiement'])) {
            $order->register(
                $_POST['firstname'],
                $_POST['lastname'],
                $_POST['delivery'],
                $_POST['address']
            );

        }
        ?>
    </header>
    <main>
    <section id="container-panier">
        <?php if(isset($_SESSION['user'])){ 
			$ids = array_keys($_SESSION['panier']);
			if(empty($ids)){
			$products = array();
			}else{
			$products = $db->query('SELECT * FROM article AS A INNER JOIN image_article as I ON A.id_article = I.id_article WHERE A.id_article IN ('.implode(',',$ids).')');
			}  
        ?>
		<nav>
	   		<ul>
	   			<li>1 - mon panier</li>
				<li><b> 2 - livraison & paiement </b></li>
				<li> 3 - confirmation </li>
	   		</ul>
        </nav>
        <form action="order.php" method='POST'>
            <section id="container-delivery">
            <?php $delivery = $order->delivery(); ?>
            </section>
            <section id="container-adress">
                <button type="submit" name="address_infos">ENREGISTRER UNE ADRESSE</button>
                <address></address>
            </section>
            <input type="text" name="firstname" placeholder="prénom*">
                   
                    <input type="text" name="lastname" placeholder="nom*">
                   
                    <input type="text" name="address" placeholder="">
                   
        </form>
            
        <section id="recap-order">
        <?php 

           
            foreach($products as $product):?>
		
            <span><img src="<?= $product->chemin;?>" height="100"></span>
			<span><?= $product->nom_article; ?></span>
			<span><?= number_format($product->prix_article,2,',',' '); ?> €</span>
			<span><input type="text" name="panier[quantity][<?= $product->id_article; ?>]" value="<?= $_SESSION['panier'][$product->id_article]; ?>"></span>
			<span>montant total<?= number_format($panier->total(),2,',',' '); ?> € </span>
			<span><a href="panier.php">modifier</a></span>
			  		
		
					<?php endforeach; ?>
			
        </section>
        <?php }else{ ?>
            <section id="connect-panier">
                <a id="white-box" href="connexion.php">Connecte-toi pour valider ton panier !</a>
                <a id="black-box" href="inscription.php">ou crée ton compte en quelques clics.</a>
            </section>
        <?php } ?>
    </section>
    </main>
    <footer>
        <?php include('includes/footer.php'); ?>
    </footer>
</body>
</html>
