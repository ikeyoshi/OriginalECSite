<?php
include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/common/common.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/MCategory.php');

$post = sanitize($_POST);

$_SESSION['id'] = $post['id'];
$product_id = $post['product_id'];
$_SESSION['product_id'] = $product_id;
$product_name = $post['product_name'];
$_SESSION['product_name'] = $product_name;
$product_name_kana = $post['product_name_kana'];
$_SESSION['product_name_kana'] = $product_name_kana;
$product_description = $post['product_description'];
$category_id = $post['category_id'];
$price = $post['price'];
$release_date = $post['release_date'];
$firstHyphen = strpos($release_date, "-");
$release_year = substr($release_date, 0, $firstHyphen);
$secondHyphen = strrpos($release_date, "-");
$release_month = substr($release_date, $firstHyphen+1, $secondHyphen-$firstHyphen-1);
$firstSpace = strpos($release_date, " ");
$release_day = substr($release_date, $secondHyphen+1, $firstSpace-$secondHyphen-1);
$release_company = $post['release_company'];
$image_file_name = $post['image_file_name'];

$mCategory = new MCategory();
$mCategoryList = $mCategory->getMCategoryList();
unset($mCategoryList[0]);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>登録内容変更</title>
</head>

<body>

  <h1>登録内容変更</h1>

  商品情報を入力してください<br />
  <br />
  <form method="post" action="/index/OriginalECSitePHP/product/modifyProductConfirm.php" enctype="multipart/form-data">
    商品ID<br />
    <input type="text" name="product_id" value="<?php echo $product_id ?>" style="width:200px"><br />
    商品名<br />
    <input type="text" name="product_name" value="<?php echo $product_name ?>" style="width:200px"><br />
    商品名(かな)<br />
    <input type="text" name="product_name_kana" value="<?php echo $product_name_kana ?>" style="width:200px"><br />
    価格<br />
    <input type="text" name="price" value="<?php echo $price ?>" style="width:200px"><br />
    商品説明<br />
    <input type="text" name="product_description" value="<?php echo $product_description ?>" style="width:200px"><br />
    カテゴリー<br />
    <select name="category_id">
      <?php foreach ($mCategoryList as $mCategory2) : if ($mCategory2['category_id'] == $category_id) : ?>
      <option value="<?php echo $mCategory2['category_id'] ?>" selected>
        <?php echo $mCategory2['category_description'] ?>
      </option>
      <?php else : ?>
      <option value="<?php echo $mCategory2['category_id'] ?>">
        <?php echo $mCategory2['category_description'] ?>
      </option>
      <?php endif ?>
      <?php endforeach ?>
    </select><br />
    商品画像<br />
    <input type="file" name="image_file" style="width:200px"><br />
    発売日(年月日)<br />
    <input type="text" name="release_year" value="<?php echo $release_year ?>" style="width:50px"><input type="text" name="release_month" value="<?php echo $release_month ?>" style="width:50px"><input type="text" name="release_day" value="<?php echo $release_day ?>"
      style="width:50px"><br />
    発売会社<br />
    <input type="text" name="release_company" value="<?php echo $release_company ?>" style="width:200px"><br />
    <br />

    <input type="submit" value="ＯＫ">
    <input type="button" onclick="history.back()" value="戻る"><br />
  </form>

</body>

</html>
