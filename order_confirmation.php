<?php $page_selected = 'order'; ?>

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
    </main>
    <footer>
        <?php include('includes/footer.php'); ?>
    </footer>
</body>
</html>
