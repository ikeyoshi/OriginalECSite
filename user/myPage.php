<?php
include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/User.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/Destination.php');

$user = new User();
$loginUser = $user->getUser($_SESSION['login_id']);

$_SESSION['password'] = $loginUser['password'];

$destination = new Destination();
$destinations = $destination->getAllDestination($_SESSION['login_user_id']);

$first_flg = true;
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>マイページ</title>
</head>

<body>

  <h1>マイページ</h1>

  <br />
  <h2>お客様情報</h2>

  <table border="1">
    <tr>
      <td>ユーザーID</td>
      <td>お名前(姓)</td>
      <td>お名前(名)</td>
      <td>お名前(姓)(かな)</td>
      <td>お名前(名)(かな)</td>
      <td>性別</td>
      <td>メールアドレス</td>
      <td>登録日</td>
      <td>更新日</td>
    </tr>
    <tr>
      <td>
        <?php echo $loginUser['user_id'] ?>
      </td>
      <td>
        <?php echo $loginUser['family_name'] ?>
      </td>
      <td>
        <?php echo $loginUser['first_name'] ?>
      </td>
      <td>
        <?php echo $loginUser['family_name_kana'] ?>
      </td>
      <td>
        <?php echo $loginUser['first_name_kana'] ?>
      </td>
      <td>
        <?php if ($loginUser['sex'] == 0) {
    echo '男性';
} else {
    echo '女性';
} ?>
      </td>
      <td>
        <?php echo $loginUser['email'] ?>
      </td>
      <td>
        <?php echo $loginUser['regist_date'] ?>
      </td>
      <td>
        <?php echo $loginUser['update_date'] ?>
      </td>
    </tr>
  </table>
  <br />

  <form method="post" action="/index/OriginalECSitePHP/user/modifyUser.php">
    <input type="hidden" name="family_name" value="<?php echo $loginUser['family_name'] ?>">
    <input type="hidden" name="first_name" value="<?php echo $loginUser['first_name'] ?>">
    <input type="hidden" name="family_name_kana" value="<?php echo $loginUser['family_name_kana'] ?>">
    <input type="hidden" name="first_name_kana" value="<?php echo $loginUser['first_name_kana'] ?>">
    <input type="hidden" name="sex" value="<?php echo $loginUser['sex'] ?>">
    <input type="hidden" name="email" value="<?php echo $loginUser['email'] ?>">
    <input type="submit" value="ユーザー情報を変更する">
  </form><br />

  <h2>宛先一覧</h2>

  <?php if (count($destinations)) : ?>

  変更・削除したい宛先を選んでください<br /><br />

  <form method="post">

    <table border="1">
      <tr>
        <td></td>
        <td>お名前</td>
        <td>お名前(かな)</td>
        <td>メールアドレス</td>
        <td>電話番号</td>
        <td>住所</td>
      </tr>
      <?php foreach ($destinations as $destination): ?>
      <tr>
        <td>
          <?php if ($first_flg) : $first_flg = false ?>
          <input type="radio" name="destination_id" value="<?php echo $destination['id'] ?>" checked="checked">
          <?php else : ?>
          <input type="radio" name="destination_id" value="<?php echo $destination['id'] ?>">
          <?php endif ?>
        </td>
        <td>
          <?php echo $destination['family_name'] ?>
          <?php echo $destination['first_name'] ?>
        </td>
        <td>
          <?php echo $destination['family_name_kana'] ?>
          <?php echo $destination['first_name_kana'] ?>
        </td>
        <td>
          <?php echo $destination['email'] ?>
        </td>
        <td>
          <?php echo $destination['tel_number'] ?>
        </td>
        <td>
          <?php echo $destination['user_address'] ?>
        </td>
      </tr>
      <?php endforeach ?>
    </table>
    <br />

    <input type="submit" value="宛先情報を変更する" formaction="/index/OriginalECSitePHP/destination/modifyDestination.php">
    <input type="submit" value="宛先情報を削除する" formaction="/index/OriginalECSitePHP/destination/deleteDestinationConfirm.php">
  </form>

  <?php else : ?>
  宛先が登録されていません<br />

  <?php endif ?>

  <br />
  <a href=/index/OriginalECSitePHP/user/purchaseHistory.php>購入履歴を見る </a> <br /><br />

  <a href=/index/OriginalECSitePHP/user/deleteUserConfirm.php>アカウントを削除する </a> </body> </html>
