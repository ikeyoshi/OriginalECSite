<?php
include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/common/common.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/Destination.php');

$destination = new Destination();
$destination->addDestination($_SESSION['login_user_id'], $_SESSION['family_name'], $_SESSION['first_name'], $_SESSION['family_name_kana'], $_SESSION['first_name_kana'], $_SESSION['email'], $_SESSION['tel_number'], $_SESSION['user_address'])
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>宛先追加完了</title>
</head>

<body>

  宛先を追加しました<br />

  <br />
  <a href=/index/OriginalECSitePHP/settlement/settlementConfirm.php>決済確認へ戻る </a> </body> </html>
