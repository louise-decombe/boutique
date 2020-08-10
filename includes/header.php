<?php
require 'class/categories.php';

session_start();
$db = new DB();
//var_dump($db);
$category = new Categorie($db);

require_once 'class/db.php';
require 'class/users.php';
require 'class/_header.php';

$db = new DB();
//var_dump($db);
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

            <form id="search-form" action="search.php" method="GET">
               <input class=search type="search" name="search" placeholder="Recherche..." />
               <button type="submit" value="Valider" />
                <i class="fa fa-search"></i> </button>
            </form>
        </section>
        <a href="index.php"><h2>FANZINE BOOKSTORE</h2></a>
        <nav>
            <ul>

            <?php
                if (isset($_SESSION['user'])){
            ?>



<div class="dropdown">
    <li>
      <ul class="panier">
        <li class="caddie"><a href="panier.php">Panier</a>
        </li>
  <div class="dropdown-content">
    <li><?php
    // récupération des informations de session pour le panier avec array_keys qui sont les clés du tableau
    $ids = array_keys($_SESSION['panier']);
//si le tableau est vide les infos envoyées sont vides
    if(empty($ids)){
      $products = array();
    }else{
      $products = $DB->query('SELECT * FROM article WHERE id IN ('.implode(',',$ids).')');
    }
    foreach($products as $product):
    ?>
    <div class="row">
      <a href="#" class="img"> <img src="img/<?= $product->id; ?>.jpg" height="53"></a>
      <span class="name"><?= $product->name; ?></span>
      <span class="price"><?= number_format($product->price,2,',',' '); ?> €</span>
      <span class="quantity"> quantité  <?= $_SESSION['panier'][$product->id]; ?></span>
      <span class="action">
        <a href="panier.php?delPanier=<?= $product->id; ?>" class="del"> supprimer du panier</a>
      </span>
    </div>
    <?php endforeach; ?></li>
    <li class="items">
    Nombre d'articles  <span id="count"><?= //retourne la valeur du Panier
       $panier->count(); ?></span>
    </li>
  <p>   <li class="total">
      TOTAL
      <span><span id="total"><?= number_format($panier->total(),2,',',' '); ?></span> €</span>
    </li>
    <li> <?php  ?> </li>
    <button> <a href="panier.php"> Voir mon panier </a></button>
      <button><a href="order.php"> Commander </a> </button>

  </ul>
  <li>
  </li>
</div>      </a></li>

<li>


</li>


<li></p>
  </div>

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
            <?php } ?>
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
            <?php } } ?>
        </nav>


    </section>
</header>

