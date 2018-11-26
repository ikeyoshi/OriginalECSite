<?php
include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/common/common.php');

$post = sanitize($_POST);

$_SESSION['product_id'] = $post['product_id'];
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>商品削除確認</title>
</head>

<body>

  <h1>商品削除確認</h1>

  本当に商品を削除しますか？<br /><br />

  <form method="post" action="/index/OriginalECSitePHP/product/deleteProductComplete.php">
    <input type="submit" value="ＯＫ">
    <input type="button" onclick="history.back()" value="戻る">
  </form>

</body>

</html>
