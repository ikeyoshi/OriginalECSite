<?php
include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/common/common.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/Product.php');

$product = new Product();
$product->registProduct($_SESSION['product_id'], $_SESSION['product_name'], $_SESSION['product_name_kana'], $_SESSION['product_description'], $_SESSION['category_id'], $_SESSION['price'], $_SESSION['image_file_path'], $_SESSION['image_file_name'], $_SESSION['release_date'], $_SESSION['release_company'], 0);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>商品登録完了</title>
</head>

<body>

  商品登録が完了しました。<br />
  <br />
  <a href=/index/OriginalECSitePHP/topPage.php>トップページへ</a>

</body>

</html>
