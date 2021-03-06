<?php
$prd_id = $_GET['prd_id'];

$sql = "SELECT * FROM product
		WHERE prd_id = $prd_id";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
?>
<!--	List Product	-->
<div id="product">
    <div id="product-head" class="row">
        <div id="product-img" class="col-lg-2 col-md-2 col-sm-4">
            <img src="../admin/images/<?php echo $row['prd_image'];?>">
        </div>
        <div id="product-details" class="col-lg-2 col-md-2 col-sm-4">
            <h1><?php echo $row['prd_name'];?></h1>
            <ul>
                <li><span>Khởi hành:</span> <?php echo $row['prd_date'];?></li>
                <li><span>Thời gian:</span> <?php echo $row['prd_time'];?> Ngày</li>
                <li><span>Nơi khởi hành:</span> <?php echo $row['prd_start'];?></li>
                <li id="price">Chi Phí</li>
                <li id="price-number"><?php echo  number_format($row['prd_price'],0,'','.');?>đ</li>
                <li><span>Số chỗ Max:</span> <?php echo $row['prd_slot'];?></li>
            </ul>
            <div id="add-cart"><a href="../model/cart/add_cart.php?prd_id=<?php echo $row['prd_id'];?>">Book Now</a></div>
        </div>
    </div>
    <div id="product-body" class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
            <h3>Đánh giá về chuyến đi <?php echo $row['prd_name'];?></h3>
            <?php echo $row['prd_details'];?>
        </div>
    </div>
    
    <?php
    if(isset($_POST['sbm'])){
		$comm_name = $_POST['comm_name'];	
		$comm_mail = $_POST['comm_mail'];	
		$comm_details = $_POST['comm_details'];	
		
		date_default_timezone_set('Asia/Bangkok');
		$comm_date = date('Y-m-d H:i:s');
		
		$sql = "INSERT INTO comment(comm_name, comm_mail, comm_details, comm_date, prd_id)
				VALUES('$comm_name', '$comm_mail', '$comm_details', '$comm_date', '$prd_id')";
		mysqli_query($conn, $sql);
	}
	?>
	  
    <!--	Comment	-->
    <div id="comment" class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
            <h3>Bình luận sản phẩm</h3>
            <form method="post">
                <div class="">
                    <label>Tên:</label>
                    <input name="comm_name" required type="text" class="form-control">
                </div>
                <div class="">
                    <label>Email:</label>
                    <input name="comm_mail" required type="email" class="form-control">
                </div>
                <div class="">
                    <label>Nội dung:</label>
                    <textarea name="comm_details" required rows="8" class="form-control"></textarea>     
                </div>
                <button type="submit" name="sbm" class="btn-primary"><p>Gửi</p></button>
            </form> 
        </div>
    </div>
    <!--	End Comment	-->  
   
    <!--	Comments List	-->
    <div id="comments-list" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <?php
            while($row = mysqli_fetch_array($query)){
			?>
            <div class="comment-item">
                <ul>
                    <li><b><?php echo $row['comm_name'];?></b></li>
                    <li><?php echo $row['comm_date'];?></li>
                    <li>
                        <p><?php echo $row['comm_details'];?></p>
                    </li>
                </ul>
            </div>
            <?php
			}
			?>
        </div>
    </div>
    <!--	End Comments List	-->
</div>
<!--	End Product	--> 
