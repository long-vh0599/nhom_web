<?php
$post_id = $_GET['post_id'];

$sql = "SELECT * FROM posts
		WHERE post_id = $post_id";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
?>
<!--	List Post	-->
<div id="product">
    <div id="product-head" class="row">
        <div>
            <h1><?php echo $row['post_name']; ?></h1>
        </div>
        <div id="post-img" class="col-lg-4 col-md-4 col-sm-4">

            <img src="../frontEnd/images/<?php echo $row['post_img']; ?>">
        </div>
        <p>
            <?php echo $row['post_details'] ?>
        </p>
    </div>
</div>