<?php
ob_start();
session_start();
include_once('config/connect.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Home</title>
    <link rel="stylesheet" href="css/view.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/handbook.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/success.css">
</head>

<body>

    <!--	Header	-->
    <div id="header">
        <div class="container">
            <?php include_once('header.php'); ?> 
        </div>
        
    </div>
    <!--	End Header	-->

    <!--	Body	-->
    <div id="body">
        <div class="container">
            <div class="row">
                <div id="anhNen" class="col-lg-4 col-md-4 col-sm-4">
                    <img class="img-fluid" src="images/nen.jpg">
                </div>
            </div>
            <div class="row">
                <div id="main" class="col-lg-4 col-md-4 col-sm-4">
                    
                    <?php
                if(isset($_GET['page_layout'])){
					switch($_GET['page_layout']){
                        case 'product': include_once('model/products/product_detail.php'); break;
                        case 'cart': include_once('model/cart/cart.php'); break;
                        case 'success': include_once('model/products/success.php'); break;
                        case 'posts': include_once('model/handbook/post_detail.php'); break;
						//case 'search': include_once('modules/search/search.php'); break;
					}
				}
				else{
					include_once('model/products/sale.php');
					include_once('model/products/favorite.php');
				}
				?>
                </div>
            </div>
        </div>
    </div>
    <!--	End Body	-->

    <!--    Footer      -->
    <div id="footer">
        <div class="container">
            <div class="row">
                <?php include_once('footer.php'); ?>
            </div>
        </div>
    </div>

    <!--	End Footer	-->

</body>

</html>