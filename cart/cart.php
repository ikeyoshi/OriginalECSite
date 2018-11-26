<?php
include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/Cart.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/MCategory.php');

$cart = new Cart();
if (isset($_SESSION['login_user_id'])) {
    $products = $cart->getCart($_SESSION['login_user_id']);
    $total = $cart->getTotalPrice($_SESSION['login_user_id']);
} else {
    $products = $cart->getCart($_SESSION['temp_user_id']);
    $total = $cart->getTotalPrice($_SESSION['temp_user_id']);
}

$mCategory = new MCategory();
$mCategoryList = $mCategory->getMCategoryList();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>カート</title>
</head>

<body>

  <h1>カート</h1>

  <?php if (count($products)) : $_SESSION['products'] = $products ?>
  特定の商品を削除したい場合はチェックを入れてください<br />
  <br />

  <form action="/index/OriginalECSitePHP/cart/deleteCartConfirm.php" method="post">

    <table border="1">
      <tr>
        <td></td>
        <td>商品名</td>
        <td>商品名(かな)</td>
        <td>価格</td>
        <td>商品説明</td>
        <td>カテゴリー</td>
        <td>発売日</td>
        <td>商品画像</td>
        <td>個数</td>
        <td>合計価格</td>
      </tr>
      <?php foreach ($products as $product): ?>
      <tr>
        <td>
          <input type="checkbox" name="delete_id[]" value="<?php echo $product['product_id'] ?>">
        </td>
        <td>
          <?php echo $product['product_name'] ?>
        </td>
        <td>
          <?php echo $product['product_name_kana'] ?>
        </td>
        <td>
          <?php echo $product['price'] ?>円
        </td>
        <td>
          <?php echo $product['product_description'] ?>
        </td>
        <td>
          <?php echo $mCategoryList[$product['category_id']-1]['category_name'] ?>
        </td>
        <td>
          <?php echo $product['release_date'] ?>
        </td>
        <td>
          <?php if ($product['image_file_name'] == '') : ?>
          画像無し
          <?php else : ?>
          <img src="<?php echo '/index/OriginalECSitePHP/'.$product['image_file_path'].'/'.$product['image_file_name'] ?>" style="width:200px">
          <?php endif ?>
        </td>
        <td>
          <?php echo $product['product_count'] ?>
        </td>
        <td>
          <?php echo $product['subtotal']; ?>
        </td>
      </tr>
      <?php endforeach ?>
    </table>

    <br />
    <strong>総額</strong>
    <?php echo $total ?>円
    <br />

    <br />
    <input type="submit" value="商品を削除する">
  </form>

  <form action="/index/OriginalECSitePHP/cart/deleteCartConfirm.php" method="post">
    <input type="hidden" name="delete_id" value="0">
    <input type="submit" value="全ての商品を削除する">
  </form>

  <br />
  <a href=/index/OriginalECSitePHP/settlement/settlementConfirm.php>購入手続きへ進む </a> <?php else : ?>
    カートは空です<br />

    <?php endif ?>

</body>

</html>
