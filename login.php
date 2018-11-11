<?php
$rootPath = "";
include('header.php');
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>ログイン</title>
</head>

<body>

  <h1>ログイン</h1>

  ユーザーIDとパスワードを入力してください。<br />
  <br />
  <form method="post" action="loginCheck.php">
    ユーザーID<br />
    <input type="text" name="user_id" style="width:200px"><br />
    パスワード<br />
    <input type="text" name="password" style="width:200px"><br />
    <br />

    <input type="submit" value="ＯＫ">
    <input type="button" onclick="history.back()" value="戻る"><br />
  </form>

</body>

</html>
