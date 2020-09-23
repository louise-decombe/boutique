<?php 
ob_start();
$page_selected = 'admin-stock';?>

<!DOCTYPE html>
<html>
<head>
    <title>boutique - admin stock</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/0mKd0xT/icon-round-fanzine.png">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style-admin-general.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</head>

<body>
    <header>
        <?php include("includes/header.php"); 
        require 'class/admin.php';
        require 'class/admin-stock.php';
        $admin_stock = new Stock($db);
        $stock_en_cours = $admin_stock->all_stock();
        ?>
    </header>
    <main>
        <section id="nav-admin-pages">
        <?php require("admin_nav.php"); ?>
        </section>
        <section id=container-treatment></section>
        <section class="treatment-order">
            <h2>STOCK ARTICLE</h2>
            <table>
			    <thead>
				    <tr>
			  		    <th>id_stock</td>
			  			<th>id_articler</td>
						<th>Nom article</td>
                        <th>Nb d'articles</td>
                        <th>date check stock</td>
                        <th>modifier</td>
			    	</tr>
                </thead>
                <tbody>
                    <tr>
                    <?php foreach ($stock_en_cours as $stock){ //var_dump($stock['id_stock']);?>
                        <td><a id="order-nb" href="order_details.php?id=<?=$stock['id_stock']?>"><?=$stock['id_stock']?></a></td>
                        <td><?=$stock['id_article']?></td>
                        <td><?=$stock['nom_article']?></td>
                        <td><?=$stock['nb_articles_stock']?></td>
                        <td><?= (new DateTime($stock['date_check_stock']))->format('d-m-Y H:i:s')?></td>
                        <td>
                            <form method='post' action =''>
                                <input class="input-qte" type='text' name='qte_article'/>
                                <input class="input-nb" id="recalc" type='submit' value='<?=$stock['id_article']?>' name='qte'/>
                            </form>
                            <?php 

                            if(isset($_POST['qte']) && $_POST['qte'] == $stock['id_article']){
                                $add_stock = ($_POST['qte_article']);
                                $new_stock = ($stock['nb_articles_stock']) + ($_POST['qte_article']);
                                $new_s = $admin_stock->update_stock($stock['id_article'],$new_stock);
                                header('location:admin-stock.php');
                            }

                            ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table> 
        </section>
    </main>
    <footer>
        <?php include("includes/footer.php"); ?>
    </footer>
</body>
</html>
<?php
ob_end_flush();
?>
