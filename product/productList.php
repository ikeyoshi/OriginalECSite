<?php
$rootPath = "../";
include($rootPath.'header.php');
require_once($rootPath.'common/common.php');
require_once($rootPath.'common/ConnectDB.php');

try {
    $dbh = new ConnectDB();
    $sql = 'SELECT product_id,product_name,price FROM product_info WHERE 1';
    $stmt = $dbh->select($sql);
    $dbh = null;

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo 'ただいま障害により大変ご迷惑をお掛けしております。';
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>商品一覧</title>
</head>

<body>

  <h1>商品一覧</h1>

  <table border="1">
    <tr>
      <td>商品名</td>
      <td>価格</td>
    </tr>
    <?php foreach ($products as $product): ?>
    <tr>
      <td><a href="productDetail.php?procode=<?php echo $product['product_id'] ?>">
          <?php echo $product['product_name'] ?>
      </td>
      <td><a href="productDetail.php?procode=<?php echo $product['product_id'] ?>">
          <?php echo $product['price'] ?>円</td>
      </a>
    </tr>
    <?php endforeach; ?>
  </table>

  <br /><br />
  <a href="../topPage.php"> 戻る</a>

</body>

</html>
