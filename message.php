<?php
include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>メッセージ</title>
</head>

<body>

  <h1>メッセージ</h1>

  管理人へのメッセージを入力してください<br />
  <br />
  名前<br />
  <form method="post" action="/index/OriginalECSitePHP/messageConfirm.php">
    <input type="text" name="name" style="width:200px"><br />
    <br />
    メッセージ<br />
    <textarea name="message" rows="10" cols="100"></textarea><br />
    <br />

    <input type="submit" value="ＯＫ">
    <input type="button" onclick="history.back()" value="戻る">
  </form>

</body>

</html>
