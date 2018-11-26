<?php
session_start();
session_regenerate_id(true);
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/Cart.php');

$cart = new Cart();
if ($_SESSION['delete_id'] == 0) {
    $cart->deleteAllCart($_SESSION['login_user_id']);
} else {
    $cart->deleteCart($_SESSION['login_user_id'], $_SESSION['delete_id']);
}

header('Location:/index/OriginalECSitePHP/cart/cart.php');
