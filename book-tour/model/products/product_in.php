<?php
ob_start();
//session_start();
include_once('config/connect.php');
?>

<?php
$sql = "SELECT * FROM product
		WHERE cat_id = 1
		ORDER BY prd_id ASC
		LIMIT 6";
$query = mysqli_query($conn, $sql);
?>
<!--	Product	-->
<div class="products">
	<?php
	$i = 1;
	while ($row = mysqli_fetch_array($query)) {

	?>
		<div class="products-row">

			<div class="col-lg-1 col-md-1 col-sm-1 product-item">
				<a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id']; ?>"><img src="../admin/images/<?php echo $row['prd_image']; ?>"></a>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 product-item ">
				<h3><a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id']; ?>"><?php echo $row['prd_name']; ?></a></h3>
				<p>Giá: <span><?php echo  number_format($row['prd_price'], 0, '', '.'); ?>đ</span></p>
				<h4>Ngày khởi hành: <?php echo $row['prd_date'] ?></h4>
				<h4>Số chỗ: <?php echo $row['prd_slot'] ?></h4>
			</div>

		</div>
	<?php
	}
	?>
</div>