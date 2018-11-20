<?php
include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/common/common.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/Product.php');

$product = new Product();
$products = $product->getAllProduct();
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
      <td>
        <a href="/index/OriginalECSitePHP/product/productDetail.php?product_id=<?php echo $product['product_id'] ?>">
          <?php echo $product['product_name'] ?>
        </a>
      </td>
      <td>
        <a href="/index/OriginalECSitePHP/product/productDetail.php?product_id=<?php echo $product['product_id'] ?>">
          <?php echo $product['price'] ?>円
        </a>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>

  <br /><br />
  <a href=/index/OriginalECSitePHP/topPage.php>トップページへ戻る</a>

</body>

</html>
