<?php
$rootPath = "../";
include($rootPath.'header.php');
require_once($rootPath.'common/common.php');
require_once($rootPath.'class/User.php');

$post = sanitize($_POST);

$user_id = $post['user_id'];
$password = $post['password'];
$password2 = $post['password2'];
$family_name = $post['family_name'];
$first_name = $post['first_name'];
$family_name_kana = $post['family_name_kana'];
$first_name_kana = $post['first_name_kana'];
$sex = $post['sex'];
$email = $post['email'];

$flg = true;

$user = new User();
$loginUser = $user->getUser($user_id, $password);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>スタッフ登録内容確認</title>
</head>

<body>

  <h1>スタッフ登録内容確認</h1>

  <?php if ($user_id == '') : $flg = false ?>
  ユーザーIDが入力されていません。<br /><br />

  <?php elseif ($loginUser) : $flg = false ?>
  そのユーザーIDは既に登録済みです。<br /><br />

  <?php else : ?>
  ユーザーID<br />
  <?php echo $user_id ?>
  <br /><br />

  <?php endif ?>


  <?php if ($password == '' && $password2 == '') : $flg = false ?>
  パスワードを両方入力してください。<br /><br />

  <?php elseif ($password != $password2) : $flg = false ?>
  パスワードを正しく入力してください。<br /><br />

  <?php else : ?>
  パスワード<br />
  ********
  <br /><br />

  <?php endif ?>


  <?php if ($family_name == '') : $flg = false ?>
  お名前(姓)が入力されていません。<br /><br />

  <?php else : ?>
  お名前(姓)<br />
  <?php echo $family_name ?>
  <br /><br />

  <?php endif ?>


  <?php if ($first_name == '') : $flg = false ?>
  お名前(名)が入力されていません。<br /><br />

  <?php else : ?>
  お名前(名)<br />
  <?php echo $first_name ?>
  <br /><br />

  <?php endif ?>


  <?php if ($family_name_kana == '') : $flg = false ?>
  お名前(かな)(姓)が入力されていません。<br /><br />

  <?php else : ?>
  お名前(かな)(姓)<br />
  <?php echo $family_name_kana ?>
  <br /><br />

  <?php endif ?>


  <?php if ($first_name_kana == '') : $flg = false ?>
  お名前(かな)(名)が入力されていません。<br /><br />

  <?php else : ?>
  お名前(かな)(名)<br />
  <?php echo $first_name_kana ?>
  <br /><br />

  <?php endif ?>


  性別<br />

  <?php if ($sex == '0') : ?>
  男性
  <br /><br />

  <?php else : ?>
  女性 <br /><br />

  <?php endif ?>


  <?php if (preg_match('/\A[\w\-\.]+\@[\w\-\.]+\.([a-z]+)\z/', $email) == 0) : $flg = false ?>
  メールアドレスを正確に入力してください。<br /><br />

  <?php else : ?>
  メールアドレス<br />
  <?php echo $email ?>
  <br /><br />
  <?php endif ?>


  <?php if ($flg == true) :
    $_SESSION['user_id'] = $user_id;
    $_SESSION['password'] = $password;
    $_SESSION['family_name'] = $family_name;
    $_SESSION['first_name'] = $first_name;
    $_SESSION['family_name_kana'] = $family_name_kana;
    $_SESSION['first_name_kana'] = $first_name_kana;
    $_SESSION['sex'] = $sex;
    $_SESSION['email'] = $email;
  ?>
  <form method="post" action="createStaffComplete.php">
    <input type="submit" value="ＯＫ">
    <input type="button" onclick="history.back()" value="修正"><br />

    <?php else : ?>
    <input type="button" onclick="history.back()" value="修正"><br />

    <?php endif ?>

</body>

</html>
