<?php
include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/Message.php');

$message = new Message();
$message->addMessage($_SESSION['name'], $_SESSION['message']);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>メッセージ送信完了</title>
</head>

<body>

  メッセージを送信しました</body> </html>
