<?php
include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/common/common.php');

$post = sanitize($_POST);

$family_name = $post['family_name'];
$first_name = $post['first_name'];
$family_name_kana = $post['family_name_kana'];
$first_name_kana = $post['first_name_kana'];
$email = $post['email'];
$tel_number1 = $post['tel_number1'];
$tel_number2 = $post['tel_number2'];
$tel_number3 = $post['tel_number3'];
$user_address = $post['user_address'];

$flg = true;
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>宛先追加内容確認</title>
</head>

<body>

  <h1>宛先追加内容確認</h1>

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


  <?php if (preg_match('/\A[\w\-\.]+\@[\w\-\.]+\.([a-z]+)\z/', $email) == 0) : $flg = false ?>
  メールアドレスを正確に入力してください。<br /><br />

  <?php else : ?>
  メールアドレス<br />
  <?php echo $email ?>
  <br /><br />

  <?php endif ?>


  <?php if (preg_match('/\d+/', $tel_number1)==0 &&preg_match('/\d+/', $tel_number2)==0 &&preg_match('/\d+/', $tel_number3)==0) : $okflg = false ?>
  電話番号を正確に入力してください。<br /><br />

  <?php else : ?>
  電話番号<br />
  <?php echo $tel_number1.'-'.$tel_number3.'-'.$tel_number3 ?>
  <br /><br />

  <?php endif ?>


  <?php if ($user_address == '') : $flg = false ?>
  住所が入力されていません。<br /><br />

  <?php else : ?>
  住所<br />
  <?php echo $user_address ?>
  <br /><br />

  <?php endif ?>


  <?php if ($flg == true) :
    $_SESSION['family_name'] = $family_name;
    $_SESSION['first_name'] = $first_name;
    $_SESSION['family_name_kana'] = $family_name_kana;
    $_SESSION['first_name_kana'] = $first_name_kana;
    $_SESSION['email'] = $email;
    $_SESSION['tel_number'] = $tel_number1.'-'.$tel_number2.'-'.$tel_number3;
    $_SESSION['user_address'] = $user_address;
  ?>
  <form method="post" action="/index/OriginalECSitePHP/destination/addDestinationComplete.php">
    <input type="submit" value="ＯＫ">
    <input type="button" onclick="history.back()" value="修正"><br />
  </form>

  <?php else : ?>
  <input type="button" onclick="history.back()" value="修正"><br />

  <?php endif ?>

</body>

</html>
