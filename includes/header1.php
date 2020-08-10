<?php
require '_header.php'
?>
<header>
    <section id="toplogo">
<a href="index.php">
        <h1>LOVECRAFT</h1> </a>
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
                <li><a href="cart.php">           	<div class="menu">
              				<ul class="panier">
              					<li class="caddie"><a href="panier.php">Caddie</a>
              				</li>
              					<li class="items">
              						<span id="count"><?= //retourne la valeur du Panier
              						 $panier->count(); ?></span>
              					</li>
              					<li class="total">
              						TOTAL
              						<span><span id="total"><?= number_format($panier->total(),2,',',' '); ?></span> €</span>
              					</li>
              				</ul>
              		</div>      </a></li>
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
