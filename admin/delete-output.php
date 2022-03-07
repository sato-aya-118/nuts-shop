<?php 
  require '../header.php'; 
	require '../connect.php'; 

	$sql = $pdo->prepare(
		 "SELECT count(*)
		  FROM `favorite`
			 WHERE `product_id` = ?"	
			 );

  $sql->execute( [$_REQUEST['id']] ) ;
  $count1 = $sql->fetch();
	//var_dump( $count, !empty($count["count(*)"]) );
	//exit;


	$sql = $pdo->prepare( 
		"SELECT count(*)
		FROM `purchase_detail`
		WHERE `product_id` = ?"
	);

$sql->execute( [$_REQUEST['id']] ) ;
$count2 = $sql->fetch();
?>

<div class="row">
  <aside>
    <?php require 'sidebar.php'; ?>
  </aside>
  <main>
	
	<?php 
	if( !empty($count1["count(*)"]) || !empty($count2["count(*)"])){
			echo"すでに購入されているため､削除できません｡";
		}else{
			$sql=$pdo->prepare('delete from product where id=?');
			if ($sql->execute([$_REQUEST['id']])) {
			 echo '削除に成功しました。';
			} else {
			 echo '削除に失敗しました。';
			}
	  } 
?>
<?php require '../footer.php'; ?>