<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/common/common.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/common/ConnectDB.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/User.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/Cart.php');

$post = sanitize($_POST);
$user_id = $post['user_id'];
$password = $post['password'];

$user = new User();
$loginUser = $user->existUser($user_id, $password);

if ($loginUser == false) {
    include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
    echo '<h1>ログイン失敗</h1>';
    echo 'ユーザーIDかパスワードが間違っています<br /><br />';
    echo '<input type="button" onclick="history.back()" value="戻る">';
} else {
    session_start();
    session_regenerate_id(true);
    $_SESSION['login_flg'] = 1;
    $_SESSION['login_id'] = $loginUser['id'];
    $_SESSION['login_user_id'] = $loginUser['user_id'];
    $_SESSION['login_family_name'] = $loginUser['family_name'];
    $_SESSION['login_first_name'] = $loginUser['first_name'];
    $_SESSION['status'] = $loginUser['status'];

    $cart = new Cart();
    $cart->integrateCart($_SESSION['login_user_id'], $_SESSION['temp_user_id']);

    $_SESSION['temp_user_id'] = null;

    if (isset($_SESSION['fromSettlement'])) {
        unset($_SESSION['fromSettlement']);
        header('Location:/index/OriginalECSitePHP/cart/cart.php');
        exit();
    } else {
        header('Location:/index/OriginalECSitePHP/topPage.php');
        exit();
    }
}
