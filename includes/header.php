<?php
require 'class/db.php';
require 'class/users.php';

session_start();
$db = new DB();
//var_dump($db);

$user = new Users($db);
//var_dump($user);


if (isset($_POST["deco"])) {
    $user->disconnect();
}
?>
<header>
    <section id="toplogo">
        <h1>LOVECRAFT</h1>
    </section>
    <section id="first-nav">
        <section id="loupe">
            <form id="search-form" action="">
                <input class="search" type="search">
                <i class="fa fa-search"></i>
            </form>
        </section>
        <h2>FANZINE BOOKSTORE</h2>
        <nav>
            <ul>
                <li><a href="connexion.php"><i class="far fa-user"></i></a></li>
                <li><a href="cart.php"><i class="fas fa-cart-plus"></i></a></li>
            </ul>
        </nav>
    </section>
    <section>
        <nav>
            <ul>
           
                <?php
                if (isset($_SESSION['user'])){
                    ?>
                    <li><a href="profil.php">MON COMPTE</a></li>
                    <form action="index.php" method="post">
                        <input id="deco" name="deco" value="DECONNEXION" type="submit"/>
                    </form>
                    <?php
                }else{
                ?>
                <li><a  href="inscription.php"></a></li>
                <li><a  href="connexion.php"></a></li>
            </ul>
            <?php
            } ?>

        </nav>
    </section>
</header>