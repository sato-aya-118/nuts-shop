<?php session_start(); ?>
<?php
 require '../header.php';
 require '../connect.php';
 require 'menu.php'; 
?>

<?php
unset($_SESSION['product'][$_REQUEST['id']]);
echo 'カートから商品を削除しました。';
echo '<hr>';
require 'cart.php';
?>

<?php require '../footer.php'; ?>
