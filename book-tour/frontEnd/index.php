<?php
ob_start();
session_start();
define('TEMPLATE', true);
include_once('config/connect.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Home</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/view.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/category.css">
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
                    <!-- <div class="product">
                        <h3>Ưu đãi tháng này</h3>
                        
                    </div>
                    <div class="product">
                        <h3>Điểm đến ưa thích</h3>
                        
                    </div> -->
                    <?php
                if(isset($_GET['page_layout'])){
					switch($_GET['page_layout']){
						case 'product': include_once('model/products/product_detail.php'); break;
						//case 'search': include_once('modules/search/search.php'); break;
						//case 'product': include_once('modules/products/product.php'); break;
						//case 'cart': include_once('modules/cart/cart.php'); break;
						//case 'success': include_once('modules/cart/success.php'); break;
					}
				}
				else{
					//include_once('modules/products/featured.php');
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