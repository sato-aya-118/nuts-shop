<?php 
 require '../header.php';
 require '../connect.php';
?>

<table>
<tr>
<th>商品番号</th>
<th>商品名</th>
<th>価格</th>
</tr>

<?php
//$pdo=new PDO('mysql:host=localhost;dbname=sato_aya_shop;charset=utf8','sato_aya','Asdf3333-');

foreach ($pdo->query( 'select * from product')as $row) {
  ?>
  <tr>
  <td><?=htmlspecialchars($row['id'],ENT_QUOTES)?></td>
  <td><?=htmlspecialchars($row['name'],ENT_QUOTES)?></td>
  <td><?=htmlspecialchars($row['price'],ENT_QUOTES)?></td>
  </tr>
 <?php
} //foreach end.
?>
</table>
<?php require '../footer.php';?>