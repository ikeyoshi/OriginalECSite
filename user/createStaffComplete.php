<?php
$rootPath = "../";
include($rootPath.'header.php');
require_once($rootPath.'common/common.php');
require_once($rootPath.'class/User.php');

$user = new User();
$user->createUser($_SESSION['user_id'], $_SESSION['password'], $_SESSION['family_name'], $_SESSION['first_name'], $_SESSION['family_name_kana'], $_SESSION['first_name_kana'], $_SESSION['sex'], $_SESSION['email'], 1);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>登録完了</title>
</head>

<body>

  登録完了しました。<br />
  <br />
  <a href="../topPage.php">トップページへ</a>

</body>

</html>
