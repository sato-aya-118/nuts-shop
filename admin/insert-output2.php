<?php 
 require '../header.php';
 require '../connect.php';
?>

<?php
$sql=$pdo->prepare('INSERT INTO product VALUES(NULL, ?, ?)');

if (empty($_REQUEST['name'])) {
	echo '商品名を入力してください。';

} elseif (!preg_match('/[0-9]+/', $_REQUEST['price'])) {
	echo '商品価格を整数で入力してください。';
	
} elseif ($sql->execute(
	[htmlspecialchars($_REQUEST['name'],ENT_QUOTES), $_REQUEST['price']]
)) {
	echo '追加に成功しました。';

} else {
		echo '追加に失敗しました。';
}
?>

<?php require '../footer.php'; ?>
