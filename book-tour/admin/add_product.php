<?php
if (!defined('TEMPLATE')) {
    die('Bạn không có quyền truy cập vào file này !');
}

$sql = "SELECT * FROM category
		ORDER BY cat_id ASC";
$query = mysqli_query($conn, $sql);

if (isset($_POST['sbm'])) {
    $prd_name = $_POST['prd_name']; // ten
    $prd_price = $_POST['prd_price'];
    $prd_status = $_POST['prd_status'];
    $prd_date = $_POST['prd_date'];
    $prd_time = $_POST['prd_time'];
    $prd_start = $_POST['prd_start'];
    $prd_image = $_FILES['prd_image']['name'];
    $prd_image_tmp_name = $_FILES['prd_image']['tmp_name'];
    $cat_id = $_POST['cat_id'];
    $prd_slot = $_POST['prd_slot'];


    if (isset($_POST['prd_status'])) {
        $prd_status = $_POST['prd_status'];
    } else {
        $prd_status = 0;
    }
    $prd_details = $_POST['prd_details'];

    $sql = "INSERT INTO product(prd_name, prd_price, prd_start, prd_date, prd_slot, prd_time, prd_image, cat_id, prd_status,  prd_details)
			VALUES('$prd_name', '$prd_price', '$prd_start', '$prd_date', '$prd_slot', '$prd_time', '$prd_image', '$cat_id', '$prd_status', '$prd_details')";
    $query = mysqli_query($conn, $sql);
    move_uploaded_file($prd_image_tmp_name, 'images/' . $prd_image);
    header('location:index.php?page_layout=product');
}
?>
<div class="col-sm-3 col-lg-3 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li><a href="">Quản lý sản phẩm</a></li>
            <li class="active">Thêm sản phẩm</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-4">
            <h1 class="page-header">Thêm Chuyến Đi</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-2">
                        <form role="form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Tên Chuyến Đi</label>
                                <input required name="prd_name" class="form-control" placeholder="">
                            </div>

                            <div class="form-group">
                                <label>Giá </label>
                                <input required name="prd_price" type="number" min="0" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nơi Khởi Hành</label>
                                <input required name="prd_start" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Ngày Khởi Hành</label>
                                <input required name="prd_date" type="date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Số chỗ </label>
                                <input required name="prd_slot" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Thời gian chuyến đi trong </label>
                                <input required name="prd_time" type="text" class="form-control">
                            </div>

                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Ảnh sản phẩm</label>

                            <input required name="prd_image" type="file">
                            <br>
                            <div>
                                <img src="images/da_nang_prd.png">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Danh mục</label>
                            <select name="cat_id" class="form-control">
                                <?php
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <option value=<?php echo $row['cat_id']; ?>><?php echo $row['cat_name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Chuyến đi yêu thích</label>
                            <div class="checkbox">
                                <label>
                                    <input name="prd_status" type="radio" value=1>Yêu thích
                                    <input name="prd_status" type="radio" value=2>Khuyến Mãi
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mô tả chuyến đi </label>
                            <textarea required name="prd_details" class="form-control" rows="3"></textarea>
                        </div>
                        <button name="sbm" type="submit" class="btn btn-success">Thêm mới</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                    </div>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->

</div>
<!--/.main-->