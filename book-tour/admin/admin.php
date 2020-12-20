<?php
if (!defined('TEMPLATE')) {
	die('Ban khong co quyen truy cap vao file nay !');
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BacWithHerFriend - Administrator</title>

	<!-- <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/bootstrap-table.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="css/home.css">
	<link rel="stylesheet" href="css/view.css">

	<!--Icons-->
	<script src="js/lumino.glyphs.js"></script>

	<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<div class="header">
		<div class="row">
			<div class="col-lg-3 col-sm-3">
				<a class="head" href="index.php">BacWithHerFriend</a>
			</div>
			<div class="col-lg-1 col-sm-1 user-menu">
				<img class="icon-img" src="images/icon/user.png">
				<a href="logout.php">Đăng xuất</a>

			</div>
		</div>
	</div>
	<div class="col-sm-2 col-lg-1 sidebar">
		<ul class="nav menu">
			<li class="active"><a href="index.php"> Dashboard</a></li>
			<li><a href="index.php?page_layout=user">Quản lý thành viên</a></li>
			<li><a href="index.php?page_layout=product">Quản lý sản phẩm</a></li>
			<li><a href="index.php"></svg> Quản lý bình luận</a></li>
			<li><a href="index.php"> Cấu hình</a></li>
		</ul>

	</div>
	<!--/.sidebar-->

	<?php
	//	Master Page
	if (isset($_GET['page_layout'])) {
		switch ($_GET['page_layout']) {
			case 'category':
				include_once('category.php');
				break;
			case 'add_category':
				include_once('add_category.php');
				break;
			case 'edit_category':
				include_once('edit_category.php');
				break;

			case 'product':
				include_once('product.php');
				break;
			case 'add_product':
				include_once('add_product.php');
				break;
			case 'edit_product':
				include_once('edit_product.php');
				break;

			case 'user':
				include_once('user.php');
				break;
			case 'add_user':
				include_once('add_user.php');
				break;
			case 'edit_user':
				include_once('edit_user.php');
				break;
		}
	} else {
		include_once('statistic.php');
	}




	?>
</body>

</html>