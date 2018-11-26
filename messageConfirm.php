<?php
include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/common/common.php');

$post = sanitize($_POST);

$name = $post['name'];
$message = $post['message'];

$flg = true;
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>メッセージ内容確認</title>
</head>

<body>

  <h1>メッセージ内容確認</h1>

  <?php if ($name == '') : $flg = false ?>
  名前が入力されていません<br /><br />

  <?php else : ?>
  名前<br />
  <?php echo $name ?>
  <br /><br />

  <?php endif ?>


  <?php if ($message == '') : $flg = false ?>
  メッセージが入力されていません<br /><br />

  <?php else : ?>
  メッセージ<br />
  <?php echo nl2br($message) ?>
  <br /><br />

  <?php endif ?>


  <?php if ($flg == true) :
    $_SESSION['name'] = $name;
    $_SESSION['message'] = $message;
  ?>
  <form method="post" action="/index/OriginalECSitePHP/messageComplete.php">
    <input type="submit" value="ＯＫ">
    <input type="button" onclick="history.back()" value="修正"><br />
  </form>

  <?php else : ?>
  <input type="button" onclick="history.back()" value="修正"><br />

  <?php endif ?>

</body>

</html>
