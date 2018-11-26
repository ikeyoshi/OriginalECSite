<?php
session_start();
session_regenerate_id(true);
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/PurchaseHistory.php');

$purchaseHistory = new PurchaseHistory();
$purchaseHistory->deleteAllPurchaseHistory($_SESSION['login_user_id']);

header('Location:/index/OriginalECSitePHP/user/purchaseHistory.php');
