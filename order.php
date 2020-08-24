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
        $formatter = new NumberFormatter('fr_FR', NumberFormatter::CURRENCY);

        if(isset($_SESSION['user'])){ 
			$ids = array_keys($_SESSION['panier']);
			if(empty($ids)){
			$products = array();
			}else{
			$products = $db->query('SELECT * FROM article AS A INNER JOIN image_article as I ON A.id_article = I.id_article WHERE A.id_article IN ('.implode(',',$ids).')');
            } 

        if (isset($_POST['validation_paiement'])) {
            $order->register_order(
                $_POST['firstname'],
                $_POST['lastname'],
                $_POST['address'],
                $_POST['delivery_choice'],
                $_POST['nb_article'],
                $_POST['sous_total'],
                $_POST['prix_total']
            );
        }
        ?>
    </header>
    <main>
    <section id="container-order">
		<nav>
	   		<ul>
	   			<li>1 - mon panier</li>
				<li><b> 2 - livraison & paiement </b></li>
				<li> 3 - confirmation </li>
	   		</ul>
        </nav>
        <section id="sub-order">
 
            <section id="container-form-order">
                <section id="container-delivery">
                    <form action="" method="POST">
                        <?php if(isset($_POST["submit_delivery"])){
                            $_SESSION['delivery'] = ($_POST['delivery']);
                            $prix_delivery  = $_SESSION['delivery'];
                            }else{
                        ?>
                            <h1>veuillez sélectionner un mode de livraison</h1>
                           
                        <?php } ?>
                        <section id="radio-section">
                            <?php $delivery = $order->delivery();
                            foreach ($delivery as $deliver){ ?>
                            <input type="radio" name="delivery" id="<?= $deliver->prix_livraison ?>" value="<?= $deliver->prix_livraison ?>"<?php if(isset($_POST['submit_delivery']) && $_POST['delivery'] == $deliver->prix_livraison ){echo "checked";}?>>
                            <label for="<?= $deliver->nom_livraison ?>"><?= $deliver->nom_livraison ?> à <?= $formatter->formatCurrency($deliver->prix_livraison,'EUR'), PHP_EOL; ?></label>
                            <?php } 
                            ?> 
                        </section>
                        <section><button type="submit" name="submit_delivery">SÉLECTIONNER</button></section>
                    </form> 
                </section>

                <h1>veuillez compléter le formulaire pour valider votre commande</h1>

                <section id="container-infos-order">
                    <form action="" method='POST'>
                            <input type="text" name="firstname" placeholder="prénom*" size="60">
                            <input type="text" name="lastname" placeholder="nom*" size="60">
                        <section id="address">
                            <input type="text" name="address" placeholder="adresse postale*" size="131.5">
                        </section>
                        <input type="hidden" name="delivery_choice" value="<?=$prix_delivery?>">
                        <input type="hidden" name="nb_article" value="<?=$panier->count();?>">
                        <input type="hidden" name="sous_total" value="<?=$panier->total()?>">
                        <input type="hidden" name="prix_total" value="<?=$order->estimation($panier->total(), $prix_delivery);?>">
                        <?php foreach($products as $product){ ?>
                            <input type="hidden" name="article[<?=$product->id_article;?>][titre]" value="<?= $product->nom_article; ?>">
                            <input type="hidden" name="article[<?=$product->id_article;?>][id]" value="<?= $product->id_article; ?>">
                            <input type="hidden" name="article[<?=$product->id_article;?>][qte]" value="<?= $_SESSION['panier'][$product->id_article];?>">
                        <?php } ?>

                        <section id="module-paiement">
                        </section>
                        
                        <button type="submit" name="validation_paiement">VALIDER LE PAIEMENT</button>
                    </form>
                </section>
            </section>
           
            <section id="recap-order">
                <article>
                <span id="count">nombre d'articles<?= $panier->count(); ?></span>
                    <?php 
                        foreach($products as $product){
                            $check = $panier->check_stock($product->id_article);
                            if($check[0]->nb_articles_stock > 0 ){
                    ?>
                        <article>
                            <span><img src="<?= $product->chemin;?>" height="100"></span>
			                <span><?= $product->nom_article; ?></span>
                            <span><?= $product->id_article; ?></span>
                            <span class="quantity"> qté  <?= $_SESSION['panier'][$product->id_article]; ?></span>
                            <span>
                                <?php 
									$sub_total = $panier->sub_total($product->prix_article, $_SESSION['panier'][$product->id_article]);
                                    echo $formatter->formatCurrency($sub_total,'EUR'), PHP_EOL;
								?>
                            </span>
			                <span><a href="panier.php">modifier</a></span>
                        </article>
					    <?php } else{ ?>
                        
                        <span> Un des articles sélectionné n'est plus disponible en stock <span>
                    <?php }} ?>
                        </article>
                    <?php if(isset($_POST["submit_delivery"])){ ?>
                        <section>
                        <p id="delivery"> livraison <?php echo $formatter->formatCurrency($prix_delivery, 'EUR'), PHP_EOL; ?><p>
						<h2 id="total-order">TOTAL
							<?php
                            var_dump($_POST['delivery']);
							echo $formatter->formatCurrency($order->estimation($panier->total(), $prix_delivery), 'EUR'), PHP_EOL;
							?>
						</h2>
                        </section>
            </section>
                        <?php } ?>
                
            <?php }else{ ?>
            <section id="connect-panier">
                <a id="white-box" href="connexion.php">Connecte-toi pour valider ton panier !</a>
                <a id="black-box" href="inscription.php">ou crée ton compte en quelques clics.</a>
            </section>
            <?php } ?>
        </section>
        </section>
    </main>
    <footer>
        <?php include('includes/footer.php'); ?>
    </footer>
</body>
</html>
