<?php $page_selected = 'category.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>boutique - categorie</title>

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
    <section id="before"><a href="javascript:history.back()"><i class="fas fa-arrow-circle-left"></i></a></section> 
        <section id="container-category">
            <section id="banner-category">
                <h1>CATÉGORIES</h1>
            </section>
            <section id="sub-category-container">
                <?php
                $all_cat = $category->all_categories();
                //var_dump ($all_cat);
                ?>
            </section>
           
        </section>
    </main>
    <footer>
        <?php include('includes/footer.php'); ?>
    </footer>
</body>
</html>
