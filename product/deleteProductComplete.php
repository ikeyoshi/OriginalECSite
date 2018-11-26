<?php
include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/Product.php');

$product = new Product();
$product->deleteProduct($_SESSION['product_id']);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>商品削除完了</title>
</head>

<body>

  <h1>商品削除完了</h1>

  商品を削除しました<br /><br />

</body>

</html>
