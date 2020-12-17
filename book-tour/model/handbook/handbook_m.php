<?php
ob_start();
session_start();
include_once('config/connect.php');
?>

<?php
$sql = "SELECT * FROM posts
		ORDER BY post_id ASC
		LIMIT 6";
$query = mysqli_query($conn, $sql);
?>
<!--	Posts	-->
<!-- <div class="products"> -->
	<?php
	//$i = 1;
	while ($row = mysqli_fetch_array($query)) {
		//if ($i == 1) {
	?>
			<div class="handbook-row">
			<?php
		//}
			?>
			<div class="col-lg-1 col-md-1 col-sm-1 handbook-item text-center">
				<a href="index.php?page_layout=posts&post_id=<?php echo $row['post_id']; ?>"><img src="../frontEnd/images/<?php echo $row['post_img']; ?>"></a>
				<h4><a href="index.php?page_layout=posts&post_id=<?php echo $row['post_id']; ?>"><?php echo $row['post_name']; ?></a></h4>
			</div>
			<?php
			//if ($i == 3) {
			?>
			</div>
	<?php
			// 	$i = 1;
			// } else {
			// 	$i++;
			// }
		}
	?>
<!-- </div> -->
<!--	End Favorite Product	-->