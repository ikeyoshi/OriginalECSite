<?php
include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/common/common.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/Destination.php');

$post = sanitize($_POST);

$_SESSION['destination_id'] = $post['destination_id'];

$destination = new Destination();
$selectedDestination = $destination->getDestination($_SESSION['destination_id']);
$firstHyphen = strpos($selectedDestination['tel_number'], "-");
$tel_number1 = substr($selectedDestination['tel_number'], 0, $firstHyphen);
$secondHyphen = strrpos($selectedDestination['tel_number'], "-");
$tel_number2 = substr($selectedDestination['tel_number'], $firstHyphen+1, $secondHyphen-$firstHyphen-1);
$tel_number3 = substr($selectedDestination['tel_number'], $secondHyphen+1);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>登録内容変更</title>
</head>

<body>

  <h1>登録内容変更</h1>

  お客様情報を入力してください<br />
  <br />
  <form method="post" action="/index/OriginalECSitePHP/destination/modifyDestinationConfirm.php">
    お名前<br />
    <input type="text" name="family_name" value="<?php echo $selectedDestination['family_name'] ?>" style="width:100px"> <input type="text" name="first_name" value="<?php echo $selectedDestination['first_name'] ?>" style="width:100px"><br />
    お名前(かな)<br />
    <input type="text" name="family_name_kana" value="<?php echo $selectedDestination['family_name_kana'] ?>" style="width:100px"> <input type="text" name="first_name_kana" value="<?php echo $selectedDestination['first_name_kana'] ?>" style="width:100px"><br />
    メールアドレス (例 : email@abc.com)<br />
    <input type="text" name="email" value="<?php echo $selectedDestination['email'] ?>" style="width:200px"><br />
    電話番号<br />
    <input type="text" name="tel_number1" value="<?php echo $tel_number1 ?>" style="width:50px"><input type="text" name="tel_number2" value="<?php echo $tel_number2 ?>" style="width:50px"><input type="text" name="tel_number3" value="<?php echo $tel_number3 ?>" style="width:50px"><br />
    住所<br />
    <input type="text" name="user_address" value="<?php echo $selectedDestination['user_address'] ?>" style="width:200px"><br />
    <br />

    <input type="submit" value="ＯＫ">
    <input type="button" onclick="history.back()" value="戻る"><br />
  </form>

</body>

</html>
