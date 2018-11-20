<?php
include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/common/common.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/Cart.php');

$cart = new Cart();
if ($_SESSION['login_user_id'] == null) {
    $_SESSION['login_user_id'] = "";
}
if ($_SESSION['temp_user_id'] == null) {
    $_SESSION['temp_user_id'] = "";
}
$cart->addCart($_SESSION['login_user_id'], $_SESSION['temp_user_id'], $_POST['product_id'], $_POST['product_count'], $_POST['price'])
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>追加完了</title>
</head>

<body>

  カートに商品を追加しました。<br />
  <br />
  <a href=/index/OriginalECSitePHP/user/cart.php>カートを見る </a> <br />
  <a href=/index/OriginalECSitePHP/product/productList.php>商品一覧へ戻る</a><br />
  <a href=/index/OriginalECSitePHP/topPage.php>トップページへ </a> </body> </html>
