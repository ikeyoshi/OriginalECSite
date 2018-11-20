<?php
include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/common/common.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/MCategory.php');

$mCategory = new MCategory();
$mCategoryList = $mCategory->getMCategoryList();
unset($mCategoryList[0]);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>商品登録</title>
</head>

<body>

  <h1>商品登録</h1>

  商品情報を入力してください。<br />
  <br />
  <form method="post" action="/index/OriginalECSitePHP/product/registProductConfirm.php" enctype="multipart/form-data">
    商品ID<br />
    <input type="text" name="product_id" style="width:200px"><br />
    商品名<br />
    <input type="text" name="product_name" style="width:200px"><br />
    商品名(かな)<br />
    <input type="text" name="product_name_kana" style="width:200px"><br />
    商品説明<br />
    <input type="text" name="product_description" style="width:200px"><br />
    カテゴリー<br />
    <select name="category_id" style="width:200px">
      <?php foreach ($mCategoryList as $mCategory2) : ?>
        <option value="<?php echo $mCategory2['category_id'] ?>"><?php echo $mCategory2['category_description'] ?></option>
      <?php endforeach ?>
    </select><br />
    価格<br />
    <input type="text" name="price" style="width:200px"><br />
    商品画像<br />
    <input type="file" name="image_file" style="width:200px"><br />
    発売日(年月日)<br />
    <input type="text" name="release_year" style="width:50px"><input type="text" name="release_month" style="width:50px"><input type="text" name="release_day" style="width:50px"><br />
    発売会社<br />
    <input type="text" name="release_company" style="width:200px"><br />
    <br />

    <input type="submit" value="ＯＫ">
    <input type="button" onclick="history.back()" value="戻る"><br />
  </form>

</body>

</html>
