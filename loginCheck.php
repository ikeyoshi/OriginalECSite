<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/common/common.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/common/ConnectDB.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/User.php');

try {
    $post = sanitize($_POST);
    $user_id = $post['user_id'];
    $password = $post['password'];

    $user = new User();
    $loginUser = $user->existUser($user_id, $password);

    if ($loginUser == false) {
        include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
        echo 'ユーザーIDかパスワードが間違っています。<br />';
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
        $_SESSION['temp_user_id'] = null;
        header('Location:/index/OriginalECSitePHP/topPage.php');
        exit();
    }
} catch (Exception $e) {
    echo 'ただいま障害により大変ご迷惑をお掛けしております。';
    exit();
}
