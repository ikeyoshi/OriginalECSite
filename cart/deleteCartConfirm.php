<?php
include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/common/common.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/User.php');

if (isset($_POST['delete_id'])) {
    $post = sanitize($_POST);

    $delete_id = $post['delete_id'];
    $_SESSION['delete_id'] = $delete_id;
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>カート削除確認</title>
</head>

<body>

  <h1>カート削除確認</h1>

  <?php if (isset($delete_id)) : ?>
  <form method="post" action="/index/OriginalECSitePHP/cart/deleteCartComplete.php">
    本当に削除してもよろしいですか？
    <br /><br />
    <input type="submit" value="ＯＫ">
    <input type="button" onclick="history.back()" value="戻る"><br />

    <?php else : ?>
    商品が選択されていません
    <br /><br />
    <input type="button" onclick="history.back()" value="戻る"><br />

    <?php endif ?>

</body>

</html>
