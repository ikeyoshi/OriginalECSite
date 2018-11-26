<?php
include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/common/common.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/MCategory.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/Product.php');

$post = sanitize($_POST);

$keywordsList = explode(" ", str_replace("　", " ", trim($post['keywordsList'])));
$category_id = $post['category_id'];

$mCategory = new MCategory();
$mCategoryList = $mCategory->getMCategoryList();

$product = new Product();
if ($category_id == 1) {
    $products = $product->searchProduct($keywordsList);
} else {
    $products = $product->searchProductByCategoryId($keywordsList, $category_id);
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>検索結果</title>
</head>

<body>

  <h1>検索結果</h1>

  商品検索<br />
  <form method="post" action="/index/OriginalECSitePHP/product/searchProduct.php">
    <input type="text" name="keywordsList" value="<?php echo $post['keywordsList'] ?>" style="width:200px">
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
    </select>
    <input type="submit" value="検索">
  </form>

  <?php if (count($products)) : ?>
  <table border="1">
    <tr>
      <td>商品名</td>
      <td>商品名(かな)</td>
      <td>価格</td>
    </tr>
    <?php foreach ($products as $product): ?>
    <tr>
      <td>
        <a href="/index/OriginalECSitePHP/product/productDetail.php?product_id=<?php echo $product['product_id'] ?>">
          <?php echo $product['product_name'] ?>
        </a>
      </td>
      <td>
        <a href="/index/OriginalECSitePHP/product/productDetail.php?product_id=<?php echo $product['product_id'] ?>">
          <?php echo $product['product_name_kana'] ?>
        </a>
      </td>
      <td>
        <a href="/index/OriginalECSitePHP/product/productDetail.php?product_id=<?php echo $product['product_id'] ?>">
          <?php echo $product['price'] ?>円
        </a>
      </td>
    </tr>
    <?php endforeach ?>
  </table>

  <?php else : ?>
  該当する商品はありません<br />

  <?php endif ?>

</body>

</html>
