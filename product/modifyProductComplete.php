<?php
session_start();
session_regenerate_id(true);
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/Product.php');

$product = new Product();
$product->modifyProduct($_SESSION['product_id'], $_SESSION['product_name'], $_SESSION['product_name_kana'], $_SESSION['product_description'], $_SESSION['category_id'], $_SESSION['price'], $_SESSION['image_file_path'], $_SESSION['image_file_name'], $_SESSION['release_date'], $_SESSION['release_company'], 0, $_SESSION['id']);

header('Location:/index/OriginalECSitePHP/product/productDetail.php?product_id='.$_SESSION['product_id']);
