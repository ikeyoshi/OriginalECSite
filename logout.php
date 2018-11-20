<?php
session_start();
$_SESSION=array();
if (isset($_COOKIE[session_name()])==true) {
    setcookie(session_name(), '', time()-42000, '/');
}
session_destroy();

include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>ログアウト</title>
</head>

<body>

  ログアウトしました。<br />
  <br />
  <a href="/index/OriginalECSitePHP/topPage.php">トップページへ</a>

</body>

</html>
