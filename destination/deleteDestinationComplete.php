<?php
include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/Destination.php');

$destination = new Destination();
$destination->deleteDestination($_SESSION['destination_id']);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>宛先削除完了</title>
</head>

<body>

  <h1>宛先削除完了</h1>

  宛先を削除しました<br /><br />

</body>

</html>
