<?php
require 'class/db.php';
require 'class/users.php';
require 'class/categories.php';

session_start();
$db = new DB();
//var_dump($db);

$category = new Categorie($db);

$user = new Users($db);
//var_dump($user);


if (isset($_POST["deco"])) {
    $user->disconnect();
}
?>
<header>
    <?php
        if ($page_selected === 'index'){ ?>
            <a id="toplogo" href="index1.php">
                <h1>LOVECRAFT</h1>
            </a>
            <a id="top-subtitle" href="index1.php"><h2>FANZINE BOOKSTORE</h2></a>
          
        <?php
            }else{
        ?> 
    <a id="toplogo" href="index.php">
        <h1>LOVECRAFT</h1>
    </a>
    <section id="first-nav">
        <section id="loupe">
            <form id="search-form" action="">
                <input class="search" type="search">
                <i class="fa fa-search"></i>
            </form>
        </section>
        <a href="index.php"><h2>FANZINE BOOKSTORE</h2></a>
        <nav>
            <ul>
                <li><a href="cart.php"><i class="fas fa-cart-plus"></i></a></li>
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
                            <li><a class="bottomlist" href="profil.php">MES MODES DE PAIEMENT</a></li>
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
            <?php } }?>
            </ul>
        </nav>
    </section>
    <section id="second-nav">
        <nav>
            <?php $categorie = $category->categories(); ?>
            <li> <a href="about.php"> À PROPOS DE NOUS</a></li>
            <?php if (isset($_SESSION['user'])){ ?>
            <form action="index.php" method="post">
                <input id="deco1" name="deco" value="DECONNEXION" type="submit"/>
            </form>
            <?php } ?>
        </nav>


    </section>
</header>