<?php
 require '../header.php';
 require '../connect.php';
?>

<table>
<tr><th>商品番号</th><th>商品名</th><th>価格</th></tr>

<?php
foreach ($pdo->query('select * from product') as $row ) {
  ?>
  <tr>
  <td><?=$row['id']?></td>
  <td><?=$row['name']?></td>
  <td><?=$row['price']?></td>
  </tr>
<?php
} //foreach end.
?>
</table>
<?php require '../footer.php';?>