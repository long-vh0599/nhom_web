<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Home</title>
    <link rel="stylesheet" href="css/view.css">
    <link rel="stylesheet" href="css/home.css">
    <!--<link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/category.css">-->
    <link rel="stylesheet" href="css/product.css">
    <!--<link rel="stylesheet" href="css/search.css">
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
                <div id="anhNen" class="col-lg-12 col-md-12 col-sm-12">
                    <img class="img-fluid" src="images/nen.jpg">
                </div>
            </div>
            <div class="row">
                <div id="main" class="col-lg-12 col-md-12 col-sm-12">
                    <div class="product">
                        <h3>Các địa điểm du lịch trong nước</h3>
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