cd <?php
ob_start();
session_start();
include_once('config/connect.php');
?>

<?php
$sql = "SELECT * FROM product
		WHERE cat_id = 2
		ORDER BY prd_id ASC
		LIMIT 6";
$query = mysqli_query($conn, $sql);
?>
<!--	Favorite Product	-->
<div class="products">
	<?php
	$i = 1;
	while ($row = mysqli_fetch_array($query)) {
		if ($i == 1) {
	?>
			<div class="product-list card-deck">
			<?php
		}
			?>
			<div class="product-item card text-center">
				<a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id']; ?>"><img src="../admin/images/<?php echo $row['prd_image']; ?>"></a>
				<h4><a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id']; ?>"><?php echo $row['prd_name']; ?></a></h4>
				<p>Giá Bán: <span><?php echo  number_format($row['prd_price'], 0, '', '.'); ?>đ</span></p>
			</div>
			<?php
			if ($i == 3) {
			?>
			</div>
	<?php
				$i = 1;
			} else {
				$i++;
			}
		}
	?>
</div>
<!--	End Favorite Product	-->