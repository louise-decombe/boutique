<?php
require 'class/db.php';
require 'class/panier.php';
require 'class/users.php';
require 'class/categories.php';

session_start();
$db = new DB();
$panier = new Panier($db);
$category = new Categorie($db);
$user = new Users($db);
$formatter = new NumberFormatter('fr_FR', NumberFormatter::CURRENCY);

//var_dump($user);

if (isset($_POST["deco"])) {
    $user->disconnect();
}
?>
<header>
    <?php
        if ($page_selected === 'index' OR $page_selected === 'panier' OR $page_selected === 'order'){ ?>
        <a id="toplogo" href="index1.php">
            <h1>HIGH & CRAFT</h1>
        </a>
        <a id="top-subtitle" href="index1.php"><h2>FANZINE BOOKSTORE</h2></a>
    <?php
        }else{
    ?>
    <a id="toplogo" href="index.php">
        <h1>HIGH & CRAFT</h1>
    </a>
    <section id="first-nav">
        <section id="loupe">
            <form id="search-form" action="search.php" method="GET">
               <input class=search type="search" name="search" placeholder="Recherche..." />
               <button type="submit" value="Valider"><i class="fa fa-search"></i> </button>
            </form>
        </section>
        <a href="index.php"><h2>FANZINE BOOKSTORE</h2></a>
        <nav>
            <ul>
            <div class="dropdown">
                <li>
                    <ul class="panier">
                        <li class="caddie">
                            <a href="panier.php"><i class="fas fa-shopping-basket"></i></a>
                        </li>
                        <div class="dropdown-content">
                        <li>
                        <?php // récupération des informations de session pour le panier avec array_keys qui sont les clés du tableau
                            $ids = array_keys($_SESSION['panier']);
                            //si le tableau est vide les infos envoyées sont vides
                            if(empty($ids)){
                            $products = array();
                            }else{
                            $products = $db->query('SELECT * FROM article AS A INNER JOIN image_article as I ON A.id_article = I.id_article WHERE A.id_article IN ('.implode(',',$ids).')');
                            }
                            foreach($products as $product):
                            ?>
                            <div class="row">
                                <a href="#" class="img"> <img src="<?= $product->chemin; ?>" height="53"></a>
                                <span class="name"><?= $product->nom_article; ?></span>
                                <span class="price">prix : <?= $formatter->formatCurrency($product->prix_article,'EUR'), PHP_EOL; ?></span>
                                <span class="quantity"> quantité  <?= $_SESSION['panier'][$product->id_article]; ?></span>
                                <span class="action">
                                    <a href="panier.php?delPanier=<?= $product->id_article; ?>" class="del"> supprimer du panier</a>
                                </span>
                            </div>
                            <?php endforeach; ?>
                        </li>
                        <li class="items"> Nombre d'articles  
                            <span id="count"><?= //retourne la valeur du Panier
                                $panier->count(); ?>
                            </span>
                        </li>
                        <p>   
                            <li class="total">TOTAL
                                <span><span id="total"><?= $formatter->formatCurrency($panier->total(),'EUR'), PHP_EOL; ?></span> €</span>
                            </li>
                            <li> <?php  ?> </li>
                            <button> <a href="panier.php"> Voir mon panier </a></button>
                            <button><a href="order.php"> Commander </a> </button>
                        </p>
                        </div>
                    </ul>
                </li>
            </div>
            <?php
                if (isset($_SESSION['user'])){
            ?>
            <li>
                <nav class="bottom">
                    <button class="boutonmenuprincipal"><i class="far fa-user"></i></button>
                    <section class="bottom-child">
                        <li id="bottom-title">bonjour @ <?= $_SESSION['user']['firstname'] ?></li>
                        <li><a class="bottomlist" href="profil.php">MES INFORMATIONS</a></li>
                        <li><a class="bottomlist" href="past-orders.php">MES COMMANDES</a></li>
                        <li><a class="bottomlist" href="returns.php">MES LIVRAISONS</a></li>
                        <li><a class="bottomlist" href="change-password.php">CHANGER LE MOT DE PASSE</a></li>
                        <li><a class="bottomlist" href="whishlist.php">WHISHLIST</a></li>
                        <li>
                            <form action="index.php" method="post">
                                <input id="deco" name="deco" value="DECONNEXION" type="submit"/>
                            </form>
                        </li>
                    </section>
                </nav>
            </li>
            <?php
                }else{
            ?> 
            <li><a href="connexion.php"><i class="far fa-user"></i></a></li>
            <?php } ?>
            </ul>
        </nav>
    </section>
    <section class="wrapper">
        <nav>
            <ul>
                <?php $categorie = $category->categories();?>
                <li><a href="about.php">QUI SOMMES NOUS ?</a></li>
                <?php if (isset($_SESSION['user'])){ ?>
                <form action="index.php" method="post">
                    <input id="deco1" name="deco" value="DECONNEXION" type="submit"/>
                </form>
                <?php } } ?>
            </ul>
        </nav>
    </section>
</header>

