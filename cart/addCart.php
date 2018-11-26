<?php
session_start();
session_regenerate_id(true);
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/common/common.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/Cart.php');

$post = sanitize($_POST);

if ($post['product_count']>0 && $post['product_count']<6) {
    $cart = new Cart();
    if ($_SESSION['login_user_id'] == null) {
        $_SESSION['login_user_id'] = "";
    }
    if ($_SESSION['temp_user_id'] == null) {
        $_SESSION['temp_user_id'] = "";
    }
    $cart->addCart($_SESSION['login_user_id'], $_SESSION['temp_user_id'], $post['product_id'], $post['product_count'], $post['price']);

    header('Location:/index/OriginalECSitePHP/cart/cart.php');
} else {
    header('Location:/index/OriginalECSitePHP/product/productDetail.php?product_id='.$post['product_id']);
}
