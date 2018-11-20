<?php
include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/common/common.php');
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>お客様登録</title>
</head>

<body>

  <h1>お客様登録</h1>

  お客様情報を入力してください。<br />
  <br />
  <form method="post" action="/index/OriginalECSitePHP/user/createUserConfirm.php">
    ユーザーID<br />
    <input type="text" name="user_id" style="width:200px"><br />
    パスワード<br />
    <input type="text" name="password" style="width:200px"><br />
    パスワードをもう一度入力してください<br />
    <input type="text" name="password2" style="width:200px"><br />
    お名前<br />
    <input type="text" name="family_name" style="width:100px"> <input type="text" name="first_name" style="width:100px"><br />
    お名前(かな)<br />
    <input type="text" name="family_name_kana" style="width:100px"> <input type="text" name="first_name_kana" style="width:100px"><br />
    性別<br />
    <input type="radio" name="sex" value="0" checked>男性<br />
    <input type="radio" name="sex" value="1">女性<br />
    メールアドレス (例 : email@abc.com)<br />
    <input type="text" name="email" style="width:200px"><br />
    <br />

    <input type="submit" value="ＯＫ">
    <input type="button" onclick="history.back()" value="戻る"><br />
  </form>

</body>

</html>
