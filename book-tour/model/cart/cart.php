<script>
function byNow() {
    document.getElementById('frm').submit();
}
</script>
<?php
include "PHPMailer-master/src/PHPMailer.php";
include "PHPMailer-master/src/Exception.php";
include "PHPMailer-master/src/OAuth.php";
include "PHPMailer-master/src/POP3.php";
include "PHPMailer-master/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

?>
<!--	Cart	-->
<div id="my-cart">
    <div class="row">
        <div class="cart-nav-item col-lg-2 col-md-2 col-sm-4">Thông tin sản phẩm</div>
        <div class="cart-nav-item col-lg-1 col-md-1 col-sm-4">Tùy chọn</div>
        <div class="cart-nav-item col-lg-1 col-md-1 col-sm-4">Giá</div>
    </div>


    <?php
    if (isset($_SESSION['cart'])) {
        if (isset($_POST['sbm'])) {
            foreach ($_POST['quantity'] as $prd_id=>$quantity) {
                $_SESSION['cart'][$prd_id] = $quantity;
            }
        }
        
        $arr_id = array();
        foreach ($_SESSION['cart'] as $prd_id=>$quantity) {
            $arr_id[] = $prd_id;
        }
        $str_id = implode(', ', $arr_id); ?>
    <form method="post">
        <?php
    $sql = "SELECT * FROM product
    WHERE prd_id IN ($str_id)";
        $query = mysqli_query($conn, $sql);

        $total_price = 0;
        $total_price_all = 0;
        while ($row=mysqli_fetch_array($query)) {
            $total_price=$_SESSION['cart'][$row['prd_id']]*$row['prd_price'];
            $total_price_all +=$total_price; ?>
        <div class="cart-item row">
            <div class="cart-thumb col-lg-2 col-md-2 col-sm-4">
                <img src="../admin/images/<?php echo $row['prd_image']; ?>">
                <h4><?php echo $row['prd_name']; ?></h4>
            </div>

            <div class="cart-quantity col-lg-1 col-md-1 col-sm-4">
                <input type="number" id="quantity" class="form-control form-blue quantity"
                    name="quantity[<?php echo $row['prd_id']; ?>]"
                    value="<?php echo $_SESSION['cart'][$row['prd_id']]; ?>" min="1">
            </div>
            <div class="cart-price col-lg-1 col-md-1 col-sm-4">
                <b><?php echo   number_format($total_price, 0, '', '.'); ?>đ</b><a
                    href="../model/cart/del_cart.php?prd_id=<?php echo $row['prd_id']; ?>">Xóa</a></div>
        </div>
        <?php
        } ?>

        <div class="row">
            <div class="cart-thumb col-lg-2 col-md-2 col-sm-4">
                <button id="update-cart" class="btn btn-success" type="submit" name="sbm">Cập nhật giỏ hàng</button>
            </div>
            <div class="cart-total col-lg-1 col-md-1 col-sm-4"><b>Tổng cộng:</b></div>
            <div class="cart-price col-lg-1 col-md-1 col-sm-4">
                <b><?php echo   number_format($total_price_all, 0, '', '.'); ?>đ</b></div>
        </div>
    </form>

</div>
<!--	End Cart	-->
<?php
    } else {
    ?>
<div class="alert alert-danger" style="margin-top:15px;">Hiện không có sản phẩm nào trong giỏ hàng của bạn !</div>
<?php
}

if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['mail']) && isset($_POST['add'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $user_mail = $_POST['mail'];
    $add = $_POST['add'];
    

    $str_body = '';
    $str_body .= '
	<p>
		<b>Khách hàng:</b> '.$name.'<br>
		<b>Điện thoại:</b> '.$phone.'<br>
		<b>Địa chỉ:</b> '.$add.'<br>
	</p>
	';


    $str_body .= '
	<table border="1" cellspacing="0" cellpadding="10" bordercolor="#305eb3" width="100%">
		<tr bgcolor="#305eb3">
			<td width="70%"><b><font color="#FFFFFF">Sản phẩm</font></b></td>
			<td width="10%"><b><font color="#FFFFFF">Số lượng</font></b></td>
			<td width="20%"><b><font color="#FFFFFF">Tổng tiền</font></b></td>
		</tr>';

    $sql = "SELECT * FROM product
				WHERE prd_id IN ($str_id)";
    $query = mysqli_query($conn, $sql);
    $total_price = 0;
    $total_price_all = 0;
        
    while ($row = mysqli_fetch_array($query)) {
        $total_price = $_SESSION['cart'][$row['prd_id']]*$row['prd_price'];
        $total_price_all += $total_price;
            
        $str_body .= '
		<tr>
			<td width="70%">'.$row['prd_name'].'</td>
			<td width="10%">'.$_SESSION['cart'][$row['prd_id']].'</td>
			<td width="20%">'.$total_price.' đ</td>
		</tr>      
		';
    }
    $str_body .= '
		<tr>
			<td colspan="2" width="70%"></td>
			<td width="20%"><b><font color="#FF0000">'.$total_price_all.' đ</font></b></td>
		</tr>
	</table>	
	';
    
    
    $str_body .= '
	<p>
		Cám ơn quý khách đã mua hàng tại Shop của chúng tôi, bộ phận giao hàng sẽ liên hệ với quý khách để xác nhận sau 5 phút kể từ khi đặt hàng thành công và chuyển hàng đến quý khách chậm nhất sau 24 tiếng.
	</p>
	';
    //////////////////////////
$mail = new PHPMailer(true);                              
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                
        $mail->isSMTP();                                     
        $mail->Host = 'smtp.gmail.com';  
        $mail->SMTPAuth = true;                          
        $mail->Username = 'dothanhqt9x@gmail.com';                
        $mail->Password = 'wihntmakecomfmzw';                        
        $mail->SMTPSecure = 'tls';                           
        $mail->Port = 587;                                  
     
        //Recipients
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('dothanhqt9x@gmail.com', 'BacWithHerFriend Tour');				
        $mail->addAddress($user_mail);              
        
        $mail->addCC('dothanhqt9x@gmail.com');
        
        //Content
        $mail->isHTML(true);                                  // theo kieu HTML
        $mail->Subject = 'Xác nhận đơn hàng từ BacWithHerFriend';
        $mail->Body    = $str_body;
        $mail->AltBody = 'Mô tả đơn hàng';
     
        $mail->send();
        header('location:index.php?page_layout=success'); 
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
?>

<!--	Customer Info	-->
<div id="customer">
    <form id="frm" method="post">
        <div class="row">

            <div id="customer-name" class="col-lg-4 col-md-4 col-sm-4">
                <input placeholder="Họ và tên (bắt buộc)" type="text" name="name" class="form-control" required>
            </div>
            <div id="customer-phone" class="col-lg-4 col-md-4 col-sm-4">
                <input placeholder="Số điện thoại (bắt buộc)" type="text" name="phone" class="form-control" required>
            </div>
            <div id="customer-mail" class="col-lg-4 col-md-4 col-sm-4">
                <input placeholder="Email (bắt buộc)" type="text" name="mail" class="form-control" required>
            </div>
            <div id="customer-add" class="col-lg-4 col-md-4 col-sm-4">
                <input placeholder="Địa chỉ nhà riêng hoặc cơ quan (bắt buộc)" type="text" name="add"
                    class="form-control" required>
            </div>

        </div>
    </form>
    <div class="row">
        <div class="by-now col-lg-2 col-md-2 col-sm-4">
            <a onclick="byNow();" href="#">
                <b>Mua ngay</b>
                <span>Giao hàng tận nơi siêu tốc</span>
            </a>
        </div>
<<<<<<< HEAD
        <div class="by-now col-lg-2 col-md-2 col-sm-4">
            <a href="#">
                <b>Trả góp Online</b>
                <span>Vui lòng call (+84) 0933 444 555</span>
            </a>
        </div>
=======
        
>>>>>>> 78c12f7ad29c46f6f39ceb42fb86e57801c160ac
    </div>
</div>
