<?php $page_selected = 'index1';?>
<!DOCTYPE html>
<html>
<head>
    <title>boutique - homepage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/0mKd0xT/icon-round-fanzine.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<header>
    <?php
     include("includes/header.php");
     require 'class/admin-options.php';

     $select_news = $category->new();
     //var_dump($select_news);
     $title_1 = ($select_news[0]['nom_article']);
     $title_2 = ($select_news[1]['nom_article']);
     $form_index = new Admin_options($db);
     $news_index = $form_index->news();
     $quote_index = $form_index->quote();
        ?>
</header>
<main>
    <section id="container-new">
        <section class="products">
            <section class="selection">
                <section class="card">
                    <section class="front">
                        <img src="src/banner-part1.png" alt="glitch">
                    </section>
                    <section class="back">
                        <div class="back-content">
                            <a href="item.php?id=<?= ($select_news[0]['id_article'])?>">
                                <h2><?= ($select_news[0]['nom_article'])?></h2>
                            </a>
                            <a href="item.php?id=<?= ($select_news[0]['id_article'])?>">
                                <img src="<?= ($select_news[0]['chemin'])?>" alt="cover-new-in-1">
                            </a>
                        </div>
                    </section>
                </section>
                <section class="card">
                    <section class="front">
                        <img src="src/banner-part2.png" alt="glitch">
                    </section>
                    <section class="back">
                        <div class="back-content">
                            <a href="item.php?id=<?= ($select_news[1]['id_article'])?>">
                                <h2><?= ($select_news[1]['nom_article'])?></h2>
                            </a>
                            <a href="item.php?id=<?= ($select_news[1]['id_article'])?>">
                                <img src="<?= ($select_news[1]['chemin'])?>" alt="cover-new-in-2">
                            </a>
                        </div>
                    </section>
                </section>
                <section class="card">
                    <section class="front">
                        <img src="src/banner-part3.png" alt="glitch">
                    </section>
                    <section class="back">
                        <div class="back-content">
                            <a href="item.php?id=<?= ($select_news[2]['id_article'])?>">
                                <h2><?= ($select_news[2]['nom_article'])?></h2>
                            </a>
                            <a href="item.php?id=<?= ($select_news[2]['id_article'])?>">
                                <img src="<?= ($select_news[2]['chemin'])?>" alt="cover-new-in-2">
                            </a>
                        </div>
                    </section>
                </section>
                <section class="card">
                    <section class="front">
                        <img src="src/banner-part4.png" alt="glitch">
                    </section>
                    <section class="back">
                        <div class="back-content">
                            <a href="item.php?id=<?= ($select_news[3]['id_article'])?>">
                                <h2><?= ($select_news[3]['nom_article'])?></h2>
                            </a>
                            <a href="item.php?id=<?= ($select_news[3]['id_article'])?>">
                                <img src="<?= ($select_news[3]['chemin'])?>" alt="cover-new-in-2">
                            </a>
                        </div>
                    </section>
                </section>
            </section>
        </section>

        <a href="news-in.php"><h1 id="superposition-title">nouveautés</h1></a>

        <section class="products">
            <section class="selection">
                <section class="card">
                    <section class="front">
                        <img src="src/banner-part5.png" alt="glitch">
                    </section>
                    <section class="back">
                        <div class="back-content">
                            <a href="item.php?id=<?= ($select_news[4]['id_article'])?>">
                                <h2><?= ($select_news[4]['nom_article'])?></h2>
                            </a>
                            <a href="item.php?id=<?= ($select_news[4]['id_article'])?>">
                                <img src="<?= ($select_news[4]['chemin'])?>" alt="cover-new-in-2">
                            </a>
                        </div>
                    </section>
                </section>
                <section class="card">
                    <section class="front">
                        <img src="src/banner-part6.png" alt="glitch">
                    </section>
                    <section class="back">
                        <div class="back-content">
                            <a href="item.php?id=<?= ($select_news[5]['id_article'])?>">
                                <h2><?= ($select_news[5]['nom_article'])?></h2>
                            </a>
                            <a href="item.php?id=<?= ($select_news[5]['id_article'])?>">
                                <img src="<?= ($select_news[5]['chemin'])?>" alt="cover-new-in-2">
                            </a>
                        </div>
                    </section>
                </section>
                <section class="card">
                    <section class="front">
                        <img src="src/banner-part7.png" alt="glitch">
                    </section>
                    <section class="back">
                        <div class="back-content">
                            <a href="item.php?id=<?= ($select_news6['id_article'])?>">
                                <h2><?= ($select_news[6]['nom_article'])?></h2>
                            </a>
                            <a href="item.php?id=<?= ($select_news[6]['id_article'])?>">
                                <img src="<?= ($select_news[6]['chemin'])?>" alt="cover-new-in-2">
                            </a>
                        </div>
                    </section>
                </section>
                <section class="card">
                    <section class="front">
                        <img src="src/banner-part8.png" alt="glitch">
                    </section>
                    <section class="back">
                        <div class="back-content">
                            <a href="item.php?id=<?= ($select_news[7]['id_article'])?>">
                                <h2><?= ($select_news[7]['nom_article'])?></h2>
                            </a>
                            <a href="item.php?id=<?= ($select_news[7]['id_article'])?>">
                                <img src="<?= ($select_news[7]['chemin'])?>" alt="cover-new-in-2">
                            </a>
                        </div>
                    </section>
                </section>
            </section>
        </section>

        <h3 id='link_news'><a href="news-in.php">voir toutes les nouveautés</a></h3>

        <section id="index-part2">
            <article>
                <?= $news_index['text_news']; //var_dump($news_index) ?>
            </article>
            <img src="src/fanzine-saturation.jpg" alt="presentation of a stand with multiple different fanzines">
        </section>

        <section id="index-part3">
            <p>"<?= $quote_index['citation_article']?>"
                <?= $quote_index['nom_article'] ?>
                de <?= $quote_index['auteur_article']?>
            </p>
        </section>
    </section>

</main>
<footer>
    <?php
    include("includes/footer.php") ?>
</footer>
</body>
</html>
