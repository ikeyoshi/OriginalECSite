<?php
include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/common/common.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/Product.php');

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
      <td>価格</td>
      <td>商品説明</td>
      <td>発売日</td>
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
        <?php echo $selectedProduct['price'] ?>円
      </td>
      <td>
        <?php echo $selectedProduct['product_description'] ?>
      </td>
      <td>
        <?php echo $selectedProduct['release_date'] ?>
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

  <form method="post" action="/index/OriginalECSitePHP/user/addCart.php">
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
  </form>

  <a href=/index/OriginalECSitePHP/product/productList.php>商品一覧へ戻る </a> <br />

</body>

</html>
