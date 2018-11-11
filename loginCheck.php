<?php
$rootPath = "";
include($rootPath.'header.php');
require_once($rootPath.'common/common.php');
require_once($rootPath.'common/ConnectDB.php');

try {
    $post=sanitize($_POST);
    $user_id = $post['user_id'];
    $password = $post['password'];

    $dbh = new ConnectDB();
    $sql = 'SELECT user_id,family_name,first_name,status FROM user_info WHERE user_id=? AND password=?';
    $args[] = $user_id;
    $args[] = $password;
    $stmt = $dbh->exec($sql, $args);
    $dbh = null;

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user == false) {
        echo 'ユーザーIDかパスワードが間違っています。<br />';
        echo '<input type="button" onclick="history.back()" value="戻る">';
    } else {
        session_start();
        $_SESSION['login_flg'] = 1;
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['login_family_name'] = $user['family_name'];
        $_SESSION['login_first_name'] = $user['first_name'];
        $_SESSION['status'] = $user['status'];
        header('Location:topPage.php');
        exit();
    }
} catch (Exception $e) {
    echo 'ただいま障害により大変ご迷惑をお掛けしております。';
    exit();
}
