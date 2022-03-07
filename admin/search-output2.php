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
$sql=$pdo->prepare('SELECT * FROM product WHERE NAME LIKE ?');
$sql->execute(['%'.$_REQUEST['keyword'].'%']);

foreach ($sql as $row) {
 ?>
  <tr>
    <td><?=$row['id']?></td>
    <td><?=$row['name']?></td>
    <td><?=$row['price']?></td>
  </tr>
  <?php
} //foreach end.
?>
  <?php require '../footer.php';?>