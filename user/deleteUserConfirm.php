<?php
include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>アカウント削除確認</title>
</head>

<body>

  <h1>アカウント削除確認</h1>

  本当にアカウントを削除しますか？<br /><br />

  <form method="post" action="/index/OriginalECSitePHP/user/deleteUserComplete.php">
    <input type="submit" value="ＯＫ">
    <input type="button" onclick="history.back()" value="戻る">
  </form>

</body>

</html>
