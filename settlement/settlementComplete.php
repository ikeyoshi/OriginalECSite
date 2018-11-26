<?php
include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/common/common.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/PurchaseHistory.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/Cart.php');

$post = sanitize($_POST);

$_SESSION['destination_id'] = $post['destination_id'];

if (isset($_SESSION['products'])) {
    $purchaseHistory = new PurchaseHistory();
    foreach ($_SESSION['products'] as $product) {
        $purchaseHistory->addPurchaseHistory($_SESSION['login_user_id'], $product['product_id'], $product['product_count'], $product['price'], $_SESSION['destination_id']);
    }

    unset($_SESSION['products']);
    $cart = new Cart();
    $cart->deleteAllCart($_SESSION['login_user_id']);
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>決済完了</title>
</head>

<body>

  決済が完了しました

</body>

</html>
