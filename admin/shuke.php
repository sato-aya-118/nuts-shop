<!-- 商品ごとの売上合計を金額の多い順に表示する -->
<?php
	require '../header.php';
	require '../connect.php'; 
?>

<style>
.row {
  display: flex;
}

aside {
  width: 25%
}

main {
  width: 75%
}
</style>

<div class="row">
  <aside>
    <?php require 'sidebar.php'; ?>
  </aside>
  <main>

    <?php

  $sql = "SELECT product_id, name, SUM(count *price) AS shoke
	FROM `purchase_detail` AS d
	LEFT JOIN `product` AS p
  ON d.product_id = p.id
  GROUP BY product_id
	ORDER BY shoke DESC
	LIMIT 50";

//$sql_purchase = $pdo->prepare( $sql );
//$sql_purchase->execute();
  $sql_purchase = $pdo->query($sql); //?が無いならこれでも良い
  // (prepareとexexuteの合体がquery)
?>
    <h2>商品別売上集計</h2>
    <table>
      <tr>
        <th>商品番号</th>
        <th>商品名</th>
        <th>合計金額</th>
        <th></th>
      </tr>
      <tr>

        <?php 
	foreach ($sql_purchase as $row_detail) {
?>
        <td><?=$row_detail['product_id']?></td>
        <td> <?=$row_detail['name']?> </td>
        <td><?=number_format($row_detail['shoke'])?> </td>
      </tr>

      <?php } ?>

    </table>
  </main>
</div>

<?php require '../footer.php'; ?>