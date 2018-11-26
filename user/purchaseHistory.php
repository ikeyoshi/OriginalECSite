<?php
include($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/header.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/class/PurchaseHistory.php');

$purchaseHistory = new PurchaseHistory();
$products = $purchaseHistory->getPurchaseHistory($_SESSION['login_user_id']);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>購入履歴</title>
</head>

<body>

  <h1>購入履歴</h1>

  <?php if (count($products)) : $_SESSION['products'] = $products ?>
  <table border="1">
    <tr>
      <td>商品名</td>
      <td>商品説明</td>
      <td>購入価格</td>
      <td>発売日</td>
      <td>発売会社</td>
      <td>商品画像</td>
      <td>個数</td>
      <td>宛名</td>
      <td>メールアドレス</td>
      <td>電話番号</td>
      <td>宛先</td>
      <td>購入日</td>
      <td>合計価格</td>
    </tr>
    <?php foreach ($products as $product): ?>
    <tr>
      <td>
        <?php echo $product['product_name'] ?>
      </td>
      <td>
        <?php echo $product['product_description'] ?>
      </td>
      <td>
        <?php echo $product['purchase_price'] ?>円
      </td>
      <td>
        <?php echo $product['release_date'] ?>
      </td>
      <td>
        <?php echo $product['release_company'] ?>
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
        <?php echo $product['family_name'].$product['first_name'] ?>
      </td>
      <td>
        <?php echo $product['email'] ?>
      </td>
      <td>
        <?php echo $product['tel_number'] ?>
      </td>
      <td>
        <?php echo $product['user_address'] ?>
      </td>
      <td>
        <?php echo $product['regist_date'] ?>
      </td>
      <td>
        <?php echo $product['subtotal'] ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>

  <br /><br />
  <form method="post" action="/index/OriginalECSitePHP/user/deletePurchaseHistory.php">
    <input type="submit" value="購入履歴を削除する">
  </form>

  <?php else : ?>
  購入履歴はありません

  <?php endif ?>

</body>

</html>
