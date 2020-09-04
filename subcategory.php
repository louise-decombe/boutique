<?php $page_selected = 'subcategory'; ?>
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
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

</head>
<body>
    <header>
    <?php
        include("includes/header.php");
        $formatter = new NumberFormatter('fr_FR', NumberFormatter::CURRENCY);
    ?>
    </header>
    <main>

        <section id="before"><a href="javascript:history.back()"><i class="fas fa-arrow-circle-left"></i></a></section>
            <?php
            if(isset($_GET['id'])){
            $id = $_GET['id'];
            $products = $db->query("SELECT sous_categorie.nom_sous_categorie, categorie.nom_categorie
                                    FROM sous_categorie
                                    INNER JOIN categorie
                                    ON sous_categorie.id_categorie = categorie.id_categorie
                                    WHERE id_sous_categorie = '$id' ");
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
                <?php
                $article_sub_category  = $category->categorie_article($_GET['id']);
                $id_page = $_GET['id'];
                //var_dump($id_page);

                foreach ($article_sub_category as $article){
                ?>
                    <section id="container-article">
                        <a href="item.php?id=<?= $article['id_article'];?>"><img src="<?= $article['chemin']; ?>"></a>
                        <section id="description">
                            <a id="title-article" href="item.php?id=<?= $article['id_article'];?>"><?= $article['nom_article']; ?></a>
                            <a href="item.php?id=<?= $article['id_article'];?>">
                                <?= $formatter->formatCurrency($article['prix_article'],'EUR'), PHP_EOL; ?>
                            </a>
                            <?php //var_dump($article['id_article']);
                            $id = $article['id_article'];
                            ?>
                        </section>
                    </section>
                    <?php }; endforeach; }?>
            </section>

            <section id="remove-row">
                <button id="load_more" data-id="<?= $id;?>" data-id_page="<?= $id_page;?>">LOAD MORE</button>
            </section>

            <script type="text/javascript">
                $(document).ready(function(){
                    $(document).on('click','#load_more', function(event){
                    event.preventDefault();

                    var id = $('#load_more').data('id');
                    var id_page = $('#load_more').data('id_page');
                    //alert(id_page);
                    $.ajax({
                        url : "load.php",
                        method : "get",
                        data:({id_item:id, id_page:id_page}),
                            success:function(response){
                            console.log(response);
                            //$('#container-news').html(response);
                            $('#remove-row').remove();
                            $('#container-news').append(response);
                            }
                        });
                    });
                });
            </script>
        </section>
    </main>
    <footer>
        <?php include('includes/footer.php'); ?>
    </footer>
</body>
</html>
