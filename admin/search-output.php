<?php
 require '../header.php';
 require '../connect.php';
?>

<table>
<tr>
<th>商品番号</th>
<th>商品名</th>
<th>商品価格</th>
</tr>

<?php

//$pdo=new PDO('mysql:host=localhost;dbname=sato_aya_shop;charset=utf8','sato_aya','Asdf3333-');

$sql=$pdo->prepare('select * from product where name=?');
$sql->execute([$_REQUEST['keyword']]);
foreach ($sql as $row) {
  ?>

  <tr>
  <td> <?=$row['id']?> </td>
  <td> <?=$row['name']?> </td>
  <td> <?=$row['price']?> </td>
  </tr>

 <?php 
}
?>
<?php require '../footer.php';?>