<?php
session_start();
session_regenerate_id(true);
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/Destination.php');

$destination = new Destination();
$destination->modifyDestination($_SESSION['destination_id'], $_SESSION['family_name'], $_SESSION['first_name'], $_SESSION['family_name_kana'], $_SESSION['first_name_kana'], $_SESSION['email'], $_SESSION['tel_number'], $_SESSION['user_address']);

header('Location:/index/OriginalECSitePHP/user/myPage.php');
