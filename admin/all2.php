<?php require '../header.php'; ?>
<?php
	require '../connect.php'; 

foreach ( $pdo->query('select * from product') as $row ){
  ?>
  <p>
  <?=$row['id']?> : 
  <?=$row['name']?> :
  <?=$row['price']?>
  </p>
<?php
} //foreach end
?>
<?php require '../footer.php';?>