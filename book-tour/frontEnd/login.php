<?php 
session_start();
include_once ("../config/connect.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Đăng Nhập</title>

<link rel="stylesheet" href="css/home.css">

</head>

<body>

<?php
if(isset($_POST['sbm'])){
	$mail = $_POST['mail'];
	$pass = $_POST['pass'];
	$mail = (String)$mail;
	$pass = (String)$pass;
	
	$sql = "SELECT * FROM user
			WHERE user_mail = '$mail'
			AND user_pass = '$pass'";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_num_rows($query);
	
	if($row > 0){
		$_SESSION['mail'] = $mail;
		$_SESSION['pass'] = $pass;
		header('location:index.php');
	}
	else{
		$error = '<div class="alert alert-danger">Tài khoản không hợp lệ !</div>';
	}
}

?>
	
	<div class="row">
			<div class="login">
				<div class="login-heading">Đăng nhập</div>
				<div class="login-body">
                	<?php
                    if(isset($error)){echo $error;}
					?>
					<form role="form" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="mail" type="email" autofocus>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Mật khẩu" name="pass" type="password" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Nhớ tài khoản
								</label>
							</div>
							<button type="submit" name="sbm" class="btn btn-primary">Đăng nhập</button>
						</fieldset>
					</form>
				</div>
			</div>
	</div><!-- /.row -->
</body>

</html>
