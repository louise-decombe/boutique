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
               <input type="submit" value="Valider"><i class="fa fa-search"></i> </input>
            </form>
        </section>
        <a href="index.php"><h2>FANZINE BOOKSTORE</h2></a>
        <nav>
            <ul>
              <?php

               if(isset ($_SESSION['user']) && ($_SESSION['user']['is_admin'] == 1))

              {
                  ?>
              <ul>
               <li>
                   <a href="admin.php"><img src="https://img.icons8.com/material-sharp/48/000000/maintenance.png"/>admin</a>
               </li>
             </ul>
           <?php } ?>

                <div class="dropdown">
                    <li>
                        <ul>
                            <li id="basket">
                                <a href="panier.php"><i class="fas fa-shopping-basket"></i></a>
                            </li>
                            <div class="dropdown-content">
                            <?php // récupération des informations de session pour le panier avec array_keys qui sont les clés du tableau
                            $ids = array_keys($_SESSION['panier']);
                            //si le tableau est vide les infos envoyées sont vides
                            if(empty($ids)){

                            $products = array();
                            ?>
                                <span> votre panier est vide</span>
                            <?php }else{
                            $products = $db->query('SELECT * FROM article AS A INNER JOIN image_article as I ON A.id_article = I.id_article WHERE A.id_article IN ('.implode(',',$ids).')');
                            foreach($products as $product):
                            ?>
                                <li>
                                    <div class="row">
                                        <a href="#" class="img"> <img src="<?= $product->chemin; ?>" height="53"></a>
                                        <div class="mini-article">
                                            <span id="name_article"><?= $product->nom_article; ?></span>
                                            <span>prix : <?= $formatter->formatCurrency($product->prix_article,'EUR'), PHP_EOL; ?></span>
                                            <span> quantité  <?= $_SESSION['panier'][$product->id_article]; ?></span>
                                        </div>
                                </li>
                                <?php endforeach; ?>
                                <li id="total-header">TOTAL <?= $formatter->formatCurrency($panier->total(),'EUR'), PHP_EOL; ?></li>
                                <button id="basket-header"> <a href="panier.php"> Voir le panier </a></button>
                                <?php } ?>
                                    </div>
                        </ul>
                    </li>
                </div>

                <?php
                if (isset($_SESSION['user'])){
                ?>
                <div class="dropdown">
                    <li>
                        <ul>
                            <li id="profile">
                                <a href="profil.php"><i class="far fa-user"></i></i></a>
                            </li>
                            <div class="dropdown-content2">
                            <li id="dropdown-title">bonjour @ <?= $_SESSION['user']['firstname'] ?></li>
                            <li><a class="dropdownlist" href="profil.php">MES INFORMATIONS</a></li>
                            <li><a class="dropdownlist" href="orders.php">MES COMMANDES</a></li>
                            <li><a class="dropdownlist" href="deliveries.php">MES LIVRAISONS</a></li>
                            <li><a class="dropdownlist" href="profil.php">CHANGER LE PASSWORD</a></li>
                            <li><a class="dropdownlist" href="wishlist.php">WHISHLIST</a></li>
                            <li>
                                <form action="index.php" method="post">
                                    <input id="dropdown-deco" name="deco" value="DECONNEXION" type="submit"/>
                                </form>
                            </li>

                            </div>
                        </ul>
                    </li>
                </div>
            <?php
                }else{
            ?>
            <li><a href="connexion.php"><i class="far fa-user"></i></a></li>
            <?php }  ?>
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

