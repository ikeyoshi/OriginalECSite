<?php
include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/common/common.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/Product.php');

$post = sanitize($_POST);
$files = sanitize($_FILES);

$product_id = $post['product_id'];
$product_name = $post['product_name'];
$product_name_kana = $post['product_name_kana'];
$category_id = $post['category_id'];
$product_description = $post['product_description'];
$price = $post['price'];
$release_year = $post['release_year'];
$release_month = $post['release_month'];
$release_day = $post['release_day'];
$image_file_name = $files['image_file']['name'];
$image_file_type = $files['image_file']['type'];
$image_file_tmp_name = $files['image_file']['tmp_name'];
$image_file_size = $files['image_file']['size'];
$release_company = $post['release_company'];

$flg = true;

$product = new Product();
$registProductId = $product->getProduct($product_id);
$registProductName = $product->existProductName($product_name);
$registProductNameKana = $product->existProductNameKana($product_name_kana);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>商品登録内容確認</title>
</head>

<body>

  <h1>商品登録内容確認</h1>

  <?php if ($product_id == '') : $flg = false ?>
  商品IDが入力されていません<br /><br />

  <?php elseif ($product_id <= 0) : $flg = false ?>
  商品IDは0より大きい必要があります<br /><br />

<?php elseif ($registProductId && $product_id!=$_SESSION['product_id']) : $flg = false ?>
  その商品IDは既に登録済みです<br /><br />

  <?php else : ?>
  商品ID<br />
  <?php echo $product_id ?>
  <br /><br />

  <?php endif ?>


  <?php if ($product_name == '') : $flg = false ?>
  商品名が入力されていません<br /><br />

  <?php elseif ($registProductName && $product_name!=$_SESSION['product_name']) : $flg = false ?>
  その商品名は既に登録済みです<br /><br />

  <?php else : ?>
  商品名<br />
  <?php echo $product_name ?>
  <br /><br />

  <?php endif ?>


  <?php if ($product_name_kana == '') : $flg = false ?>
  商品名(かな)が入力されていません<br /><br />

  <?php elseif ($registProductNameKana && $product_name_kana!=$_SESSION['product_name_kana']) : $flg = false ?>
  その商品名(かな)は既に登録済みです<br /><br />

  <?php else : ?>
  商品名(かな)<br />
  <?php echo $product_name_kana ?>
  <br /><br />

  <?php endif ?>


  <?php if ($price == '') : $flg = false ?>
  価格が入力されていません<br /><br />

  <?php elseif ($price <= 0) : $flg = false ?>
  価格は0より大きい必要があります<br /><br />

  <?php else : ?>
  価格<br />
  <?php echo $price ?>
  <br /><br />

  <?php endif ?>


  <?php if ($product_description == '') : $flg = false ?>
  商品説明が入力されていません<br /><br />

  <?php else : ?>
  商品説明<br />
  <?php echo $product_description ?>
  <br /><br />

  <?php endif ?>


  <?php if ($release_year == '') : $flg = false ?>
  発売日(年)が入力されていません<br /><br />

  <?php elseif ($release_year<0 || $release_year>9999) : $flg = false ?>
  発売日(年)は0から9999の間である必要があります<br /><br />

  <?php else : ?>
  発売日(年)<br />
  <?php echo $release_year ?>
  <br /><br />

  <?php endif ?>


  <?php if ($release_month == '') : $flg = false ?>
  発売日(月)が入力されていません<br /><br />

  <?php elseif ($release_month<=0 || $release_month>12) : $flg = false ?>
  発売日(月)は1から12の間である必要があります<br /><br />

  <?php else : ?>
  発売日(月)<br />
  <?php echo $release_month ?>
  <br /><br />

  <?php endif ?>


  <?php if ($release_day == '') : $flg = false ?>
  発売日(日)が入力されていません<br /><br />

  <?php elseif ($release_day<=0 || $release_day>31) : $flg = false ?>
  発売日(日)は1から31の間である必要があります<br /><br />

  <?php else : ?>
  発売日(日)<br />
  <?php echo $release_day ?>
  <br /><br />

  <?php endif ?>


  <?php if ($image_file_name == '') : ?>
  商品画像<br />
  無し<br /><br />

  <?php elseif ($image_file_size > 1*1024*1024) : $flg = false ?>
  画像のサイズは1MBまでにしてください<br /><br />
  <br /><br />

  <?php elseif ($image_file_type=='image/jpeg' || $image_file_type=='image/png') : ?>
  商品画像<br />
  <?php echo $image_file_name ?>
  <br /><br />

  <?php else : $flg = false ?>
  画像はjpegファイル、もしくはpngファイルにしてください<br /><br />

  <?php endif ?>


  <?php if ($release_company == '') : $flg = false ?>
  発売会社が入力されていません<br /><br />

  <?php else : ?>
  発売会社<br />
  <?php echo $release_company ?>
  <br /><br />

  <?php endif ?>


  <?php if ($flg == true) :
    $_SESSION['product_id'] = $product_id;
    $_SESSION['product_name'] = $product_name;
    $_SESSION['product_name_kana'] = $product_name_kana;
    $_SESSION['product_description'] = $product_description;
    $_SESSION['category_id'] = $category_id;
    $_SESSION['price'] = $price;
    if ($image_file_name != '') {
        $image_file_name = date("YmdHis").$image_file_name;
        move_uploaded_file($image_file_tmp_name, $_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/images/'.$image_file_name);
    }
    $_SESSION['image_file_path'] = './images';
    $_SESSION['image_file_name'] = $image_file_name;
    $date = date_create();
    date_date_set($date, $release_year, $release_month, $release_day);
    date_time_set($date, 0, 0, 0);
    $_SESSION['release_date'] = date_format($date, 'Y-m-d H:i:s');
    $_SESSION['release_company'] = $release_company;
  ?>
  <form method="post" action=/index/OriginalECSitePHP/product/modifyProductComplete.php> <input type="submit" value="ＯＫ">
    <input type="button" onclick="history.back()" value="修正"><br />
  </form>

  <?php else : ?>
  <input type="button" onclick="history.back()" value="修正"><br />

  <?php endif ?>

</body>

</html>
