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
    <link rel="stylesheet" href="stripe-card-payment/global.css" />
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    <script type="text/javascript">
        function modification(X)
        {
            if ( X.value.length == 4 ){
            chaine = X.getAttribute('id') ;
            indice = chaine.charAt(6) ;
            indice++ ;
            document.getElementById("groupe" + indice).focus()
            }
        }         
    </script>
</head>

<body>
    <header>
        <?php 
        include("includes/header.php");
        require 'class/order.php';
        $order = new Order($db);

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
	   			    <li><a id="link-basket" href="panier.php"> 1 - mon panier </a></li>
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

                    <?php if(isset($_POST["submit_delivery"])){ ?>
                    <section id="container-infos-order">
                        <form action="" method='POST'>
                            <section id="delivery-infos">
                                <legend> - vos informations de livraison - </legend>
                                <section>
                                    <input type="text" name="firstname" placeholder="prénom*">
                                    <input type="text" name="lastname" placeholder="nom*">
                                    <input id="address" type="text" name="address" placeholder="adresse postale*">
                                    <input type="text" name="infos-delivery" placeholder="informations complémentaires pour le livreur"> 
                                </section>
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
                                <legend id=title-cb>- Paiement sécurisé par 
                                    <i class="far fa-credit-card"></i>
                                    <i class="fab fa-cc-visa"></i>
                                    <i class="fab fa-cc-mastercard"></i>
                                    -
                                </legend>
                                <section id="section-cb">
                                    <section>
                                        <label> nom du titulaire de la carte* </label>
                                        <input type="text" placeholder="nom du titulaire de la carte*" size="55" required>
                                    </section>
                                    <section>
                                        <label>numéro de carte bancaire* &nbsp;</label>
                                        <section id="input-cb">
                                            <input id="groupe1" type="text" size="4" maxlength="4" onkeyup="modification(this)" required>
                                            <input id="groupe2" type="text" size="4" maxlength="4" onkeyup="modification(this)" required>
                                            <input id="groupe3" type="text" size="4" maxlength="4" onkeyup="modification(this)" required>
                                            <input id="groupe4" type="text" size="4" maxlength="4">
                                        </section>
                                        <section id="cb-infos">
                                            <label>date d'expiration*</label>
                                            <input type="text" placeholder="MM/YYYY*" required>
                                            <label>CVC*</label>
                                            <input type="password" placeholder="CVC*" required>
                                        </section>
                                    </section>
                                </section>
                            </section>
                            <button type="submit" name="validation_paiement">PAYER <?= $formatter->formatCurrency($order->estimation($panier->total(), $prix_delivery), 'EUR'), PHP_EOL;  ?></button>
                        </form>
                    </section>
                </section>

                <section id="recap-order">
                    <section id="recap-order-container1">
                        <span id="count">Mon panier (<?= $panier->count(); ?> article(s))</span>
                        <?php 
                            foreach($products as $product){
                            $check = $panier->check_stock($product->id_article);
                            if($check[0]->nb_articles_stock > 0 ){
                        ?>
                        <section id="recap-article">
                            <img src="<?= $product->chemin;?>">
			                <p><?= $product->nom_article; ?>&nbsp; qté : 
                               <?= $_SESSION['panier'][$product->id_article]; ?>&nbsp;
                                <?php 
									$sub_total = $panier->sub_total($product->prix_article, $_SESSION['panier'][$product->id_article]);
                                    echo $formatter->formatCurrency($sub_total,'EUR'), PHP_EOL;
								?>
                            </p>
                        </section>
					    <?php } else{ ?>
                        <span> Un ou plusieurs articles sélectionnés ne sont plus disponibles en stock <span>
                    </section>   

                    <?php } } ?>
                    <?php if(isset($_POST["submit_delivery"])){ ?>

                    <section id="recap-order-container2">
                        <span><a href="panier.php">modifier</a></span>
                        <span id="delivery-charging"> Livraison <?= $formatter->formatCurrency($prix_delivery, 'EUR'), PHP_EOL; ?></span>
                        <h2 id="total-order">MONTANT TOTAL <?= $formatter->formatCurrency($order->estimation($panier->total(), $prix_delivery), 'EUR'), PHP_EOL;?></h2>
                    </section>
                </section>  
                <aside id="recap-order-container3">
					<span> PAIEMENT SÉCURISÉ & RETOURS GRATUITS </span>
					<a href="tel:0800 00 00 00">SERVICE CLIENT : 0800 00 00 00 (N° GRATUIT)</a>
					<p>Le service client est joignable du Lundi au Vendredi de 9h à 19h et le Samedi de 10h à 17h ou via notre rubrique contact.
					   En raison des circonstances exceptionnelles, les délais de réponse du service client peuvent être impactés. Nous en sommes désolés et vous remercions pour votre patience.
					   L’équipe High & Craft !
					</p>
				</aside> 
                    <?php } }?>
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

