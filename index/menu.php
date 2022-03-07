<?php @session_start();?>
<?php if(isset($_SESSION['customer'])) {
// ※ログインしているか ?>
<a href="index.php">HOME</a>
<a href="favorite-show.php">お気に入り</a>
<a href="history.php">購入履歴</a>
<a href="cart-show.php">カート</a>
<a href="purchase-input.php">購入</a>
<a href="logout-input.php">ログアウト</a>
<a href="customer-input.php">会員情報変更</a>

<?php }else{
 //ログインしていないか  ?>
<a href="product.php">HOME</a>
<a href="login-input.php">ログイン</a>
<a href="newcustomer-input.php">新規会員登録</a>

<?php } ?>
<hr>
 