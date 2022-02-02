<?php 
require '../header.php';
require '../connect.php';
require 'menu.php';
?>

<form action="product.php" method="post">
商品検索
<input type="text" name="keyword">
<input type="submit" value="検索">
</form>
<hr>
<?php
echo '<table>';
echo '<th>商品番号</th><th>商品名</th><th>価格</th>';
//$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 'staff', 'password');
if (isset($_REQUEST['keyword'])) {
	$sql=$pdo->prepare('SELECT * FROM product WHERE NAME LIKE ?');
	$sql->execute(['%'.$_REQUEST['keyword'].'%']);
} else {
	$sql=$pdo->prepare('SELECT * FROM product');
	$sql->execute([]);
}
foreach ($sql as $row) {
	// $sql は1行しか無いが､2次元の格好をしている
	// ループは1回しかしない
	//row '行' 列はcol  
	// 3 ひまわりの種 210

	$id=$row['id'];
	?>
	<tr>
	<td><?=$id?></td>
	<td>
	<a href="detail.php?id=<?=$id?>"><?=$row['name']?></a>
	</td>
	<td><?=$row['price']?> </td>
	</tr>
<?php
}
?>
</table>

<?php require '../footer.php'; ?>