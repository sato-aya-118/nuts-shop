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
/*
購入履歴テーブルから顧客IDで絞り込み,降順で取得 
購入履歴テーブルと購入明細と商品一覧を3つ結合
*/	
  $sql = "SELECT purchase_id , name, g.gokei, date
	FROM `purchase` AS p
	LEFT JOIN `customer` AS c ON c.id = p.customer_id
	LEFT JOIN ( 
		SELECT purchase_id ,sum(count * price) gokei
		FROM `purchase_detail` as d
		LEFT JOIN `product` AS t ON t.id = d.product_id
		GROUP BY purchase_id
		ORDER BY purchase_id
	) AS g ON p.id = g.purchase_id
	ORDER BY date DESC
	LIMIT 50
	";

$sql_purchase = $pdo->prepare( $sql );
	$sql_purchase->execute();
  // $sql_purchase->query($sql); ?が無いならこれでも良い
  // (prepareとexexuteの合体がquery)
?>
    <h2>注文一覧</h2>
    <table>
      <tr>
        <th>注文番号</th>
        <th>顧客名</th>
        <th>合計金額</th>
        <th>日付</th>
      </tr>
      <tr>

        <?php 
	foreach ($sql_purchase as $row_detail) {
?>
        <td><a href="order_detail.php?id=<?=$row_detail['purchase_id']?>""> <?=$row_detail['purchase_id']?> </a></td>
        <td> <?=$row_detail['name']?> </td>
        <td><?=number_format($row_detail['gokei'])?> </td>
        <td><?=$row_detail['date']?> </td>
      </tr>

      <?php } ?>

    </table>
  </main>
</div>

<?php require '../footer.php'; ?>