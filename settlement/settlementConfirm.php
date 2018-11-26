<?php
session_start();
session_regenerate_id(true);
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/Destination.php');

if (isset($_SESSION['login_flg'])) {
    $destination = new Destination();
    $destinations = $destination->getAllDestination($_SESSION['login_user_id']);
} else {
    $_SESSION['fromSettlement'] = true;
    header('Location:/index/OriginalECSitePHP/login.php');
    exit();
}

include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');

$first_flg = true;
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>決済確認</title>
</head>

<body>

  <h1>決済確認</h1>

  <?php if (count($destinations)) : ?>

  宛先を選択してください<br />
  <br />

  <form action="/index/OriginalECSitePHP/settlement/settlementComplete.php" method="post">

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
    <a href=/index/OriginalECSitePHP/destination/addDestination.php>宛先を追加する </a> <br />

    <br />
    <input type="submit" value="決済を完了する">
  </form>

  <?php else : ?>
  宛先が登録されていません<br />

  <?php endif ?>

</body>

</html>
