<?php require '../header.php'; ?>



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

    <table>
      <tr>
        <th>商品番号</th>
        <th>商品名</th>
        <th>商品価格</th>
      </tr>
      <?php
  require '../connect.php';

foreach ($pdo->query('select * from product') as $row) {
	?>
      <tr>
        <td><?=$row['id']?></td>
        <td><?=$row['name']?></td>
        <td><?=$row['price']?></td>
        <td>
          <a href="delete-output.php?id=<?=$row['id']?>">削除</a>
        </td>
      </tr>

      <?php
} //foreach end.
?>
    </table>
  </main>
</div>

<script>
function del() {
  // 任意のタイミングで実行したいから囲む
  // 複数の箇所から呼び出して同じ処理をしたいから
  // ネイティブな(組み込み)関数の引数にするため
  if (!confirm('削除していいですか?')) {
    document.bgColor = "green"; //この行を実行
    return false; // リンク先へ行かせない
  }
}
</script>
  <?php require '../footer.php'; ?>