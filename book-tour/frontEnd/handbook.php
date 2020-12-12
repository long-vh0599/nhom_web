<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Home</title>
    <link rel="stylesheet" href="css/view.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/handbook.css">
    <!--<link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/category.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/success.css">-->
    <!--<script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script> -->
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
                    <div class="handbook">
                        <h3>Những điều bạn cần biết khi đi du lịch</h3>
                        <h4>Luôn luôn vui vẻ không quạo</h4>
                        <?php include_once('model/products/handbook_m.php'); ?>
                    </div>
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