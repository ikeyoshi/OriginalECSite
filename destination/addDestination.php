<?php
include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>宛先追加</title>
</head>

<body>

  <h1>宛先追加</h1>

  宛先を入力してください<br />
  <br />
  <form method="post" action="/index/OriginalECSitePHP/destination/addDestinationConfirm.php">
    お名前<br />
    <input type="text" name="family_name" style="width:100px"> <input type="text" name="first_name" style="width:100px"><br />
    お名前(かな)<br />
    <input type="text" name="family_name_kana" style="width:100px"> <input type="text" name="first_name_kana" style="width:100px"><br />
    メールアドレス (例 : email@abc.com)<br />
    <input type="text" name="email" style="width:200px"><br />
    電話番号<br />
    <input type="text" name="tel_number1" style="width:50px">-<input type="text" name="tel_number2" style="width:50px">-<input type="text" name="tel_number3" style="width:50px"><br />
    住所<br />
    <input type="text" name="user_address" style="width:200px"><br />
    <br />

    <input type="submit" value="ＯＫ">
    <input type="button" onclick="history.back()" value="戻る"><br />
  </form>

</body>

</html>
