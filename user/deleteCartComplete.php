<?php
include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/common/common.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/Cart.php');

$cart = new Cart();
if ($_SESSION['delete_id'] == 0) {
    $cart->deleteAllCart($_SESSION['login_user_id']);
} else {
    $cart->deleteCart($_SESSION['login_user_id'], $_SESSION['delete_id']);
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>削除完了</title>
</head>

<body>

  削除が完了しました<br />
  <br />
  <a href=/index/OriginalECSitePHP/topPage.php>トップページへ</a>

</body>

</html>
