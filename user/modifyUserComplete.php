<?php
session_start();
session_regenerate_id(true);
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/User.php');

$user = new User();
if ($_SESSION['status'] == 0) {
    $user->modifyUser($_SESSION['login_user_id'], $_SESSION['password'], $_SESSION['family_name'], $_SESSION['first_name'], $_SESSION['family_name_kana'], $_SESSION['first_name_kana'], $_SESSION['sex'], $_SESSION['email'], 0);
} elseif ($_SESSION['status'] == 1) {
    $user->modifyUser($_SESSION['login_user_id'], $_SESSION['password'], $_SESSION['family_name'], $_SESSION['first_name'], $_SESSION['family_name_kana'], $_SESSION['first_name_kana'], $_SESSION['sex'], $_SESSION['email'], 1);
}

header('Location:/index/OriginalECSitePHP/user/myPage.php');
