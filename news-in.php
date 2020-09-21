
<?php 
$page_selected = 'news-in'; 
$current_month = date('F');

?>

<!DOCTYPE html>
<html>

<head>
    <title>boutique - news-in</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/0mKd0xT/icon-round-fanzine.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <header>
        <?php
        include("includes/header.php");
        ?>
    </header>
    <main>
        <section id="before"><a href="javascript:history.back()"><i class="fas fa-arrow-circle-left"></i></a></section>
        <section id="container-news-in">
        <section id="current-month">
            <h1>
                <?= $current_month?>
            </h1>
            <img src="https://i.ibb.co/tXpqcHq/new.png" alt="new">
        </section>

        <section id="container-news">

            <?php

            // selection des 16 dernières  nouveautés

            
            $products = $db->query('SELECT * FROM article as A INNER JOIN image_article as I ON A.id_article = I.id_article WHERE MONTH(date_registration) = MONTH(NOW())ORDER by date_registration DESC');
                
            // la boucle qui démarre permet d'afficher les articles  
            foreach ($products as $product):
                     //var_dump ($product);
  			?>

            <section id="container-article">
  				<a href="item.php?id=<?= $product->id_article; ?>">
  				    <img src="<?= $product->chemin;?>" width="10%" alt="cover-fanzine">
  			    </a>
                <a id="title-article" href="item.php?id=<?= $product->id_article;?>">
  					<?= $product->nom_article; ?>
  			    </a>
  				<section id="description">
                    <a href="item.php?id=<?= $product->id_article; ?>">
                      <?= $formatter->formatCurrency($product->prix_article,'EUR'), PHP_EOL;?>
                    </a></br>
                    <?php if(isset($_SESSION['user'])){ ?>
                        <a href="addwishlist.php?id=<?= $id_article ?>">
                            <i class="far fa-heart"></i>
                        </a>
                        <a class="add addpanier" href="addpanier.php?id=<?= $id_article ?>">
                            +
                        </a>
                        <?php }?>
                </section>
            </section>
              <?php endforeach ?>

        </section> 
        </section>
    </main>
    <footer>
        <?php include('includes/footer.php'); ?>
    </footer>
</body>
</html>


