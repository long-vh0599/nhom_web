<div id="cart" class="col-lg-1 col-md-1 col-sm-4">
    <a class="cart-text" href="index.php?page_layout=cart">giỏ hàng</a><span class="cart-simp"><?php if(isset($_SESSION['cart'])){echo count($_SESSION['cart']);}else{echo 0;}?></span>
</div>