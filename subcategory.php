<?php $page_selected = 'subcategory.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>boutique - sous-categories</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/0mKd0xT/icon-round-fanzine.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style-category.css">
</head>
<body>
    <header>
    <?php
        include("includes/header.php");
    ?>
    </header>
    <main>
        <?php
        if(isset($_GET['id'])){
        $id = $_GET['id'];
        $products = $db->query("SELECT sous_categorie.nom_sous_categorie, categorie.nom_categorie FROM sous_categorie INNER JOIN categorie ON sous_categorie.id_categorie = categorie.id_categorie WHERE id_sous_categorie = '$id' ");
        //var_dump($product);
       foreach ( $products as $product ):
        ?>
        <section id="container-news-in">
            <section id="title-subcategory">
                <h1><?= $product->nom_sous_categorie;?></h1>
                <aside id="current-category">
                    <b><?= $product->nom_sous_categorie;?></b> /
                    <a href="category.php"><?= $product->nom_categorie;?></a> /
                    <a href="index1.php">home</a>
                </aside>
            </section>
          
            <section id="container-news">

            <?php $article_sub_category  = $category->categorie_article($_GET['id']);
            foreach ($article_sub_category as $article){ 
            ?>
                <section id="container-article"> 
                    <a href="item.php?id=<?= $article['id_article'];?>"><img src="<?= $article['chemin']; ?>"></a>
                    <a id="title-article" href="item.php?id=<?= $article['id_article'];?>"><?= $article['nom_article']; ?></a>
                    <section id="description">
                        <a href="#" >
                        <?= //number format permet de formater un nombre ici avec deux zéros
                        number_format($article['prix_article'],2,',',' ');
                        ?>
                        €</a>
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
            <?php }; endforeach; }?>
                <section id="add-articles">
                    <form class='onglet' method='POST'>
                        <input id="more_articles" name="more_articles" value="VOIR + D'ARTICLES" type="submit"/>
                        <input name="more_articles" value="AFFICHER TOUT" type="submit1"/>
                    </form> 
                </section>
            </section>  
        </section>
    </main> 
    <footer>
        <?php include('includes/footer.php'); ?>
    </footer>
</body>
</html>

