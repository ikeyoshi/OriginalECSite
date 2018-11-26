<?php
include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/MCategory.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/Product.php');

$mCategory = new MCategory();
$mCategoryList = $mCategory->getMCategoryList();

$product = new Product();
$selectedProduct = $product->getProduct($_GET['product_id']);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>商品詳細</title>
</head>

<body>

  <h1>商品詳細</h1>

  <table border="1">
    <tr>
      <td>商品名</td>
      <td>商品名(かな)</td>
      <td>商品説明</td>
      <td>カテゴリー</td>
      <td>価格</td>
      <td>発売日</td>
      <td>発売会社</td>
      <td>商品画像</td>
    </tr>
    <tr>
      <td>
        <?php echo $selectedProduct['product_name'] ?>
      </td>
      <td>
        <?php echo $selectedProduct['product_name_kana'] ?>
      </td>
      <td>
        <?php echo $selectedProduct['product_description'] ?>
      </td>
      <td>
        <?php echo $mCategoryList[$selectedProduct['category_id']-1]['category_name'] ?>
      </td>
      <td>
        <?php echo $selectedProduct['price'] ?>円
      </td>
      <td>
        <?php echo $selectedProduct['release_date'] ?>
      </td>
      <td>
        <?php echo $selectedProduct['release_company'] ?>
      </td>
      <td>
        <?php if ($selectedProduct['image_file_name'] == '') : ?>
        画像無し
        <?php else : ?>
        <img src="<?php echo '/index/OriginalECSitePHP/'.$selectedProduct['image_file_path'].'/'.$selectedProduct['image_file_name'] ?>" style="width:200px">
        <?php endif ?>
      </td>
    </tr>
  </table>
  <br /><br />

  <form method="post" action="/index/OriginalECSitePHP/cart/addCart.php">
    <input type="hidden" name="product_id" value="<?php echo $_GET['product_id'] ?>">
    購入個数<br />
    <select name="product_count" style="width:200px">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
    <input type="hidden" name="price" value="<?php echo $selectedProduct['price'] ?>">
    <input type="submit" value="カートに入れる"><br /><br />

    <?php if (isset($_SESSION['status']) && $_SESSION['status'] == 1) : ?>
    <input type="hidden" name="id" value="<?php echo $selectedProduct['id'] ?>">
    <input type="hidden" name="product_name" value="<?php echo $selectedProduct['product_name'] ?>">
    <input type="hidden" name="product_name_kana" value="<?php echo $selectedProduct['product_name_kana'] ?>">
    <input type="hidden" name="product_description" value="<?php echo $selectedProduct['product_description'] ?>">
    <input type="hidden" name="category_id" value="<?php echo $selectedProduct['category_id'] ?>">
    <input type="hidden" name="price" value="<?php echo $selectedProduct['price'] ?>">
    <input type="hidden" name="release_date" value="<?php echo $selectedProduct['release_date'] ?>">
    <input type="hidden" name="release_company" value="<?php echo $selectedProduct['release_company'] ?>">
    <input type="hidden" name="image_file_name" value="<?php echo $selectedProduct['image_file_name'] ?>">
    <input type="submit" value="商品情報を変更する" formaction="/index/OriginalECSitePHP/product/modifyProduct.php"><br /><br />
    <input type="submit" value="商品を削除する" formaction="/index/OriginalECSitePHP/product/deleteProductConfirm.php">
    <?php endif ?>
  </form>

</body>

</html>
