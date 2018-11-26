<?php
include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/User.php');

$user = new User();
$user->createUser($_SESSION['user_id'], $_SESSION['password'], $_SESSION['family_name'], $_SESSION['first_name'], $_SESSION['family_name_kana'], $_SESSION['first_name_kana'], $_SESSION['sex'], $_SESSION['email'], 0);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>お客様登録完了</title>
</head>

<body>

  登録が完了しました

</body>

</html>
