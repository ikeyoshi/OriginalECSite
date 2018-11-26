<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/common/ConnectDB.php');

class Cart
{
    protected $id;
    protected $user_id;
    protected $temp_user_id;
    protected $product_id;
    protected $product_count;
    protected $price;
    protected $regist_date;
    protected $update_date;
    // カートに入っている商品情報を取得
    public function getCart($current_user_id)
    {
        try {
            $dbh = new ConnectDB();
            $sql = 'SELECT ci.id as id, ci.user_id as user_id, ci.temp_user_id as temp_user_id,
                    ci.product_id as product_id, sum(ci.product_count) as product_count, pi.price as price,
                    pi.regist_date as regist_date, pi.update_date as update_date,
                    pi.product_name as product_name, pi.product_name_kana as product_name_kana,
                    pi.product_description as product_description, pi.category_id as category_id,
                    pi.image_file_path as image_file_path, pi.image_file_name as image_file_name,
                    pi.release_date as release_date, pi.release_company as release_company,
                    pi.status as status,(sum(ci.product_count)*pi.price) as subtotal FROM cart_info as ci
                    LEFT JOIN product_info as pi ON ci.product_id=pi.product_id WHERE ci.user_id=?
                    group by product_id';
            $args[] = $current_user_id;
            $stmt = $dbh->exec($sql, $args);
            $dbh = null;

            $cartList = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $cartList;
        } catch (Exception $e) {
            echo 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
    }
    // 全種類の商品の合計金額を計算
    public function getTotalPrice($current_user_id)
    {
        try {
            $totalPrice = 0;
            $dbh = new ConnectDB();
            $sql = "SELECT sum(product_count*price) as total_price
                    FROM cart_info WHERE user_id=? group by user_id";
            $args[] = $current_user_id;
            $stmt = $dbh->exec($sql, $args);
            $dbh = null;

            $totalPrice = $stmt->fetch(PDO::FETCH_ASSOC);

            return $totalPrice['total_price'];
        } catch (Exception $e) {
            echo 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
    }
    // カートに商品を追加
    public function addCart($user_id, $temp_user_id, $product_id, $product_count, $price)
    {
        try {
            $dbh = new ConnectDB();
            $count = 0;
            $sql = 'INSERT INTO cart_info (user_id, temp_user_id, product_id, product_count, price, add_date, update_date)
                    VALUES (?, ?, ?, ?, ?, now(), now())';
            $args[] = $user_id;
            $args[] = $temp_user_id;
            $args[] = $product_id;
            $args[] = $product_count;
            $args[] = $price;
            $count = $dbh->exec($sql, $args);
            $dbh = null;

            return $count;
        } catch (Exception $e) {
            echo 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
    }
    // カートから特定の商品を削除
    public function deleteCart($user_id, $product_ids)
    {
        try {
            $dbh = new ConnectDB();
            $count = 0;
            foreach ($product_ids as $product_id) {
                $sql = "DELETE FROM cart_info WHERE user_id=? AND product_id=?";
                $args = array();
                $args[] = $user_id;
                $args[] = $product_id;
                $count = $dbh->exec($sql, $args);
            }
            $dbh = null;

            return $count;
        } catch (Exception $e) {
            echo 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
    }
    // カートから全ての商品を削除
    public function deleteAllCart($user_id)
    {
        try {
            $dbh = new ConnectDB();
            $count = 0;
            $sql = "DELETE FROM cart_info WHERE user_id=?";
            $args[] = $user_id;
            $count = $dbh->exec($sql, $args);
            $dbh = null;

            return $count;
        } catch (Exception $e) {
            echo 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
    }
    // 一時ユーザーのカート情報をログインユーザーのカート情報に書き換え
    public function integrateCart($user_id, $temp_user_id)
    {
        try {
            $dbh = new ConnectDB();
            $count = 0;
            $sql = "UPDATE cart_info SET user_id=?, temp_user_id=null
                    WHERE temp_user_id=?";
            $args[] = $user_id;
            $args[] = $temp_user_id;
            $count = $dbh->exec($sql, $args);
            $dbh = null;

            return $count;
        } catch (Exception $e) {
            echo 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
    }
}
