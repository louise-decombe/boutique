<?php $page_selected = 'item'; ?>

<!DOCTYPE html>
<html>

<head>
    <title>boutique - article</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/0mKd0xT/icon-round-fanzine.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style-item.css">
</head>

<body>
    <header>
        <?php
        include("includes/header.php");
        $id_article = $_GET['id'];
        $item = $category->article_infos($id_article);
        ?>
    </header>
    <main>
        <section id="before"><a href="javascript:history.back()"><i class="fas fa-arrow-circle-left"></i></a></section>
        <section id="container-item">
            <section id="box-img-item">
                <img src="<?= ($item['chemin'])?>" width="10%" alt="cover-fanzine">
            </section>
                <article id="presentation-item">
                        <?php if (isset($_SESSION['user'])) {


                          ?>

                        <?php $id_user= ($_SESSION['user']['id_user']);
                              $id_article = $_GET['id'];
                              $query = $db->query("SELECT * FROM wishlist WHERE id_utilisateur = $id_user AND id_article= $id_article");


            if (count($query) >= 1 ) { # On vérifie si l'utilisateur n'a pas déja ajouté l'objet à sa wishlist
                echo "Vous avez  ajouté cet article à votre wishlist";
            } else { # Si les deux sont faux, alors on peut ajouter à la wishlist
?>

<form method="post" action="action_wishlist.php" class="form" id="userForm">

  <input type="hidden" name="id_utilisateur" value="<?php echo $id_user; ?>"/>
  <input type="hidden" name="id_article" value="<?php echo $id_article ?>"/>
  <input type="hidden" name="action_type" value="add"/>
    <input type="submit" class="" name="submit_wish" value="+ wishlist"/>



<?php }
} ?>

                    <h1><?= ($item['nom_article'])?></h1>
                    <h2>par <?= ($item['auteur_article']).', '.($item['editions_article'])?></h2>
                        <aside id="ex-item">exemplaires disponibles : <?= ($item['nb_articles_stock'])?></aside>
                        <section id="price-item">
                            <?= $formatter->formatCurrency($item['prix_article'], 'EUR'), PHP_EOL; ?>
                        </section>

                        <a class="add addpanier" onclick="window.location.reload()" id="add-basket" href="addpanier.php?id=<?= $id_article ?>">
                            ajouter au panier
                        </a>

                    <form class='onglet' method='POST'>
                        <input id="more_infos" name="more" value="EN SAVOIR +" type="submit"/>
                    </form>

                    <?php if (isset($_POST['more'])) {?>
                    <section id="more">
                        <a href="item.php?id=<?=($item['id_article'])?>">x</a>
                        <p><?= ($item['description_article'])?></p>
                        <p>nb de pages : <?= ($item['nb_pages'])?></p>
                    </section>
                    <?php } ?>

                </article>
        </section>
        <aside id="info-category">
            <b><?= ($item['nom_sous_categorie']);?></b> &nbsp; /  &nbsp;
            <section id="cat-sub-link">
                <a href="category.php"><?= ($item['nom_categorie']);?> /
                <a href="index1.php">home </a>
            </section>
        </aside>
        <section id="similar-article">
            <h3>vous aimerez peut-être...</h3>
            <?php
            $similar_art = $category->similar_article(($item['id_sous_categorie']), ($item['id_article']));
            ?>
            <section id="selection">
                <?php

                foreach ($similar_art as $similar) {
                    if ($similar['id_article'] != $item['id_article']) {
                        ?>
                <section id="selection-article">
                    <a href="item.php?id=<?=($similar['id_article'])?>"><img src="<?= ($similar['chemin'])?>" width="10%" alt="cover-fanzine">
                    <a href="item.php?id=<?=($similar['id_article'])?>" class="button">
                        <span class="text-hover">CONSULTER</span>
                        <span class="text-base"><?= $formatter->formatCurrency($similar['prix_article'], 'EUR'), PHP_EOL; ?></span>
                    </a>
                </section>

            <?php
                    }
                } ?>
            </section>

        </section>
    </main>
    <footer>

        <?php include('includes/footer.php');

        ?>
    </footer>
</body>
</html>
