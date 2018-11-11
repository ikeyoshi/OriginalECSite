<?php
session_start();
session_regenerate_id(true);

if (isset($_SESSION['login_flg']) == false) {
    echo 'ようこそ ゲスト 様 ';
    echo '<br /><br />';
    echo '<a href='.$rootPath.'login.php>ログイン</a><br />';
    echo '<a href='.$rootPath.'user/createUser.php>会員登録</a><br />';
    echo '<a href='.$rootPath.'topPage.php>トップページ</a><br />';
    echo '<br /><br />';
} elseif ($_SESSION['status'] == 0) {
    echo 'ようこそ ';
    echo $_SESSION['login_family_name'].$_SESSION['login_first_name'];
    echo ' 様 ';
    echo '<br /><br />';
    echo '<a href='.$rootPath.'logout.php>ログアウト</a><br />';
    echo '<br /><br />';
} else {
    echo 'ようこそ ';
    echo $_SESSION['login_family_name'].$_SESSION['login_first_name'];
    echo ' 様 ';
    echo '<br /><br />';
    echo '<a href='.$rootPath.'./user/createStaff.php>スタッフ登録</a><br />';
    echo '<a href='.$rootPath.'./product/addProduct.php>商品登録</a><br />';
    echo '<a href='.$rootPath.'logout.php>ログアウト</a><br />';
    echo '<br /><br />';
}
