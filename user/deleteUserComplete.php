<?php
session_start();

require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/User.php');

$user = new User();
$user->deleteUser($_SESSION['login_user_id']);

$_SESSION = array();
if (isset($_COOKIE[session_name()]) == true) {
    setcookie(session_name(), '', time()-42000, '/');
}
session_destroy();

include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>アカウント削除完了</title>
</head>

<body>

  <h1>アカウント削除完了</h1>

  アカウントを削除しました<br /><br />

</body>

</html>
