<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/common/common.php');
session_start();
session_regenerate_id(true);

if (isset($_SESSION['login_flg']) == false) {
    echo 'ようこそ ゲスト 様 ';
    echo '<br />';
    echo 'あなたのID : ';
    if (isset($_SESSION['temp_user_id']) == false) {
        $temp_user_id = makeRandStr(16);
        $_SESSION['login_user_id'] = $temp_user_id;
        $_SESSION['temp_user_id'] = $temp_user_id;
    }
    echo $_SESSION['temp_user_id'];
    echo '<br /><br />';
    echo '<a href=/index/OriginalECSitePHP/login.php>ログイン</a><br />';
    echo '<a href=/index/OriginalECSitePHP/user/createUser.php>会員登録</a><br />';
    echo '<a href=/index/OriginalECSitePHP/product/productList.php>商品一覧</a><br />';
    echo '<a href=/index/OriginalECSitePHP/user/cart.php>カート</a><br />';
    echo '<a href=/index/OriginalECSitePHP/topPage.php>トップページ</a><br />';
    echo '<br /><br />';
} elseif ($_SESSION['status'] == 0) {
    echo 'ようこそ ';
    echo $_SESSION['login_family_name'].$_SESSION['login_first_name'];
    echo ' 様 ';
    echo '<br />';
    echo 'あなたのID : '.$_SESSION['login_user_id'];
    echo '<br /><br />';
    echo '<a href=/index/OriginalECSitePHP/logout.php>ログアウト</a><br />';
    echo '<a href=/index/OriginalECSitePHP/product/productList.php>商品一覧</a><br />';
    echo '<a href=/index/OriginalECSitePHP/user/cart.php>カート</a><br />';
    echo '<a href=/index/OriginalECSitePHP/user/myPage.php>マイページ</a><br />';
    echo '<a href=/index/OriginalECSitePHP/topPage.php>トップページ</a><br />';
    echo '<br /><br />';
} else {
    echo 'ようこそ ';
    echo $_SESSION['login_family_name'].$_SESSION['login_first_name'];
    echo ' 様 ';
    echo '<br />';
    echo 'あなたのID : '.$_SESSION['login_user_id'];
    echo '<br /><br />';
    echo '<a href=/index/OriginalECSitePHP/logout.php>ログアウト</a><br />';
    echo '<a href=/index/OriginalECSitePHP/user/createStaff.php>管理者登録</a><br />';
    echo '<a href=/index/OriginalECSitePHP/product/registProduct.php>商品登録</a><br />';
    echo '<a href=/index/OriginalECSitePHP/product/productList.php>商品一覧</a><br />';
    echo '<a href=/index/OriginalECSitePHP/user/cart.php>カート</a><br />';
    echo '<a href=/index/OriginalECSitePHP/user/myPage.php>マイページ</a><br />';
    echo '<a href=/index/OriginalECSitePHP/topPage.php>トップページ</a><br />';
    echo '<br /><br />';
}
