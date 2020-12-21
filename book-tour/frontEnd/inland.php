<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Home</title>
    <link rel="stylesheet" href="css/view.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/product.css">
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
                <?php include_once('search_box.php'); ?>
            </div>
            <div class="row">
                <div id="main" class="col-lg-4 col-md-4 col-sm-4">
                    <?php
                    if (isset($_GET['page_layout'])) {
                        switch ($_GET['page_layout']) {
                            case 'search':
                                include_once('../model/search/search.php');
                                break;
                        }
                    } else { ?>
                        <div class="product">
                            <h3>Các địa điểm du lịch trong nước</h3>
                            <?php include_once('model/products/product_in.php'); ?>
                        </div>
                    <?php
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