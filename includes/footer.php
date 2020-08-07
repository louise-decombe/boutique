<?php

    require 'class/categories.php';

    $category = new Categorie($db);
    //$categorie = $category->categories();
    //var_dump ($categorie);

    if (isset($_POST['newsletter'])) {
        $user->newsletter_footer($_POST['email']);
    }
?>
<footer>
    <?php if ($page_selected === 'index'){ ?>
        <section id="index-footer">
            <h2>FANZINE BOOKSTORE</h2>
        </section>
        <?php
            }else{
        ?> 
    <section id="container-service">
        <ul>
            <li><i class="fas fa-cube"></i> &nbsp; livraison et retours gratuits</li>
            <li><i class="far fa-credit-card"></i> &nbsp; paiement sécurisé</li>
            <li><i class="fas fa-truck"></i> &nbsp; suivi de commande</li>
            <li> <i class="fas fa-phone"></i> &nbsp; service client 
                <a class="contact" href="tel:0800000000">0800 00 00 00</a>(N° GRATUIT)
            </li>
        </ul>
    </section>
    <section id="container-footer">
        <section id="footer-part1">
            <section id="newsletter">
                <h3>inscris-toi à notre newsletter</h3>
                <form action="" method="POST">
                    <input type="text" id="news" name="email" placeholder="Enter your email"></br>
                    <input type="submit" name="newsletter" id="btnnews" value="newsletter">
                </form>
            </section>
            <section id="end-logo">
                <a href="index.php">
                    <h1>LOVECRAFT</h1>
                    <h2>FANZINE BOOKSTORE</h2>
                </a>
            </section>
            <section id="social-media">
                <ul id="social-list">
                    <li><a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="https://www.pinterest.com" target="_blank"><i class="fab fa-pinterest"></i></a></li>
                </ul>
            </section>
        </section>
        <section id="footer-part2">
            <section>
                <h4>À propos de nous</h4>
                <address>
                    1 avenue du fanzine </br>
                    13001 Marseille
                    <a class="contact" href="tel:+330491919191">"tel:+330491919191"</a>
                    <a class="contact" href="mailto:hello@lovecraftbookstore.com">hello@fanzinebookstore.com</a>
                </address>
            </section>
            <section>
                <h4>Espace mon compte</h4>
                <ul>
                    <li><a href="connexion.php">mon compte client</a></li>
                    <li><a href="connexion.php">suivi de commande</a></li>
                    <li><a href="connexion.php">ma whishlist</a></li>
                    <li><a href="connexion.php">F.A.Q.</a></li>
                </ul>
            </section>
            <section>
                <h4>Espace distribution</h4>
                <ul>
                    <li><a href="connexion.php">vendre son fanzine</a></li>
                    <li><a href="connexion.php">formulaire de contact</a></li>
                    <li><a href="connexion.php">F.A.Q.</a></li>
                </ul>
            </section>
            <section>
                <h4>Mentions légales</h4>
                <ul>
                    <li><a href="connexion.php">c.g.v.</a></li>
                    <li><a href="connexion.php">politique de confidentialité</a></li>
                    <li><a href="connexion.php">mentions légales</a></li>
                    <li><a href="connexion.php">charte cookies</a></li>
                </ul>
            </section>
            <section id="footer-nav">
                <nav>
                    <ul>
                        <?php $categorie = $category->categories(); ?>
             
                        <?php if (isset($_SESSION['user']['id_user'])){
                                if ($_SESSION['user']['is_admin'] == 1) {
                        ?>
                        <li><a href="admin.php">espace admin</a></li>
                        <?php } ?>
                        <form action="index.php" method="post">
                            <input id="deco1" name="deco" value="DECONNEXION" type="submit"/>
                        </form>
                        <?php 
                            } 
                        ?>
                    </ul>
                </nav>
            </section>
        </section>
        <p id="copyright">&copy; 2020 LOVECRAFT FANZINE BOOKSTORE</p>
    </section>
    <?php 
        } 
    ?>
</footer>
