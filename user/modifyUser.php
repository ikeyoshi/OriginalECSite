<?php
include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/common/common.php');

$post = sanitize($_POST);

$family_name = $post['family_name'];
$first_name = $post['first_name'];
$family_name_kana = $post['family_name_kana'];
$first_name_kana = $post['first_name_kana'];
$sex = $post['sex'];
$email = $post['email'];
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>登録内容変更</title>
</head>

<body>

  <h1>登録内容変更</h1>

  お客様情報を入力してください<br />
  <br />
  <form method="post" action="/index/OriginalECSitePHP/user/modifyUserConfirm.php">
    パスワード<br />
    <input type="text" name="password" value="<?php echo $_SESSION['password'] ?>" style="width:200px"><br />
    パスワードをもう一度入力してください<br />
    <input type="text" name="password2" value="<?php echo $_SESSION['password'] ?>" style="width:200px"><br />
    お名前<br />
    <input type="text" name="family_name" value="<?php echo $family_name ?>" style="width:100px"> <input type="text" name="first_name" value="<?php echo $first_name ?>" style="width:100px"><br />
    お名前(かな)<br />
    <input type="text" name="family_name_kana" value="<?php echo $family_name_kana ?>" style="width:100px"> <input type="text" name="first_name_kana" value="<?php echo $first_name_kana ?>" style="width:100px"><br />
    性別<br />
    <?php if ($sex == 0) : ?>
    <input type="radio" name="sex" value="0" checked>男性<br />
    <input type="radio" name="sex" value="1">女性<br />
    <?php else : ?>
    <input type="radio" name="sex" value="0">男性<br />
    <input type="radio" name="sex" value="1" checked>女性<br />
    <?php endif ?>
    メールアドレス (例 : email@abc.com)<br />
    <input type="text" name="email" value="<?php echo $email ?>" style="width:200px"><br />
    <br />

    <input type="submit" value="ＯＫ">
    <input type="button" onclick="history.back()" value="戻る"><br />
  </form>

</body>

</html>
