<?php
ob_start();
session_start();
include_once('config/connect.php');
?>

<?php
$sql = "SELECT * FROM posts";
$query = mysqli_query($conn, $sql);
?>
<!--	Posts	-->
<?php
while ($row = mysqli_fetch_array($query)) {

?>
    <div class="handbook-row">

        <div class="col-lg-1 col-md-1 col-sm-1 handbook-item">
            <a><img src="images/<?php echo $row['post_img']; ?>"></a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 handbook-item ">
            <h3><a><?php echo $row['post_name']; ?></a></h3>
            <h4><?php echo $row['post_details'] ?></h4>
        </div>

    </div>
<?php
}
?>