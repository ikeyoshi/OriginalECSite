<?php
include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/common/common.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/User.php');

$user = new User();
$loginUser = $user->getUser($_SESSION['login_id']);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>マイページ</title>
</head>

<body>

  <h1>マイページ</h1>

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
  <br /><br />

  <a href=/index/OriginalECSitePHP/topPage.php>トップページへ戻る </a> <br />

</body>

</html>
