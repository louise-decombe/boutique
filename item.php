<?php $page_selected = 'item.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <title>boutique - article</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/0mKd0xT/icon-round-fanzine.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
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
        <section id="container-item">

            <section id="box-img-item">
                <img src="<?= ($item['chemin'])?>" width="10%" alt="cover-fanzine">
            </section>

                <article id="presentation-item">
                    <a id="heart-icon" href="addwishlist.php?id=<?= $id_article ?>">
                        <i class="far fa-heart"></i>
                    </a>
                    <h1><?= ($item['nom_article'])?></h1>
                    <h2>par <?= ($item['auteur_article']).', '.($item['editions_article'])?></h2>
                        <aside id="ex-item">exemplaires disponibles : <?= ($item['nb_articles_stock'])?></aside>
                        <section id="price-item">
                            <?= //number format permet de formater un nombre ici avec deux zéros
                            number_format(($item['prix_article']),2,',',' ');
                        ?>
                        €
                        </section>

                    <a class="add addpanier" id="add-basket" href="addpanier.php?id=<?= $id_article ?>">
                        ajouter au panier
                    </a>

                    <form class='onglet' method='POST'>
                        <input id="more_infos" name="more" value="EN SAVOIR +" type="submit"/>
                    </form>

                    <?php if(isset($_POST['more'])){?>
                    <section id="more">
                        <a href="item.php?id=<?=($item['id_article'])?>">x</a>
                        <p><?= ($item['description_article'])?></p>
                        <p>nb de pages : <?= ($item['nb_pages'])?></p>
                    </section>
                    <?php } ?>

                </article>
        </section>
        <aside id="info-category">
            <b><?= ($item['nom_sous_categorie']); ?></b> /
            <a href="category.php"><?= ($item['nom_categorie']);?> /
            <a href="index1.php">home </a>
        </aside>
        <section id="similar-article">
            <h3>vous aimerez peut-être...</h3>
            <section id="selection">
            <?php
            $similar = $category->similar_article(($item['id_sous_categorie']));
            //var_dump(($similar['chemin']));
            //var_dump(($similar['prix_article']));

            ?>

            </selection>
        </section>
    </main>
    <footer>

        <?php include('includes/footer.php');

        ?>
    </footer>
</body>
</html>
