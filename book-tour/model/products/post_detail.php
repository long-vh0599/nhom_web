<?php
$post_id = $_GET['post_id'];

$sql = "SELECT * FROM posts
		WHERE post_id = $post_id";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
?>
<!--	List Product	-->
<div id="product">
    <div id="product-head" class="row">
        <h1><?php echo $row['post_name'];?></h1>
        <div id="product-img" class="col-lg-6 col-md-6 col-sm-12">
             
            <img src="../../../../../2/nhom_web/book-tour/frontEnd/images/<?php echo $row['post_img'];?>">
        </div>
        <p>
            <?php echo $row['post_details'] ?>
        </p>
    </div>
</div> 