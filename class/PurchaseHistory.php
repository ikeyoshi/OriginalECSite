<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/common/ConnectDB.php');

class PurchaseHistory
{
    protected $id;
    protected $user_id;
    protected $family_name;
    protected $first_name;
    protected $family_name_kana;
    protected $first_name_kana;
    protected $email;
    protected $tel_number;
    protected $user_address;
    protected $regist_date;
    protected $update_date;
    // ログインユーザーの購入情報を取得
    public function getPurchaseHistory($login_user_id)
    {
        try {
            $dbh = new ConnectDB();
            $sql = 'SELECT phi.id as id, phi.user_id as user_id, phi.product_count as product_count,
                    pi.product_id as product_id, pi.product_name as product_name,
                    pi.product_name_kana as product_name_kana, pi.product_description as product_description,
                    pi.category_id as category_id, pi.price as current_price, pi.image_file_path as image_file_path,
                    pi.image_file_name as image_file_name, pi.release_date, pi.release_company,
                    phi.price as purchase_price, phi.regist_date as regist_date, phi.update_date as update_date,
                    di.family_name as family_name, di.first_name as first_name,
                    di.family_name_kana as family_name_kana, di.first_name_kana as first_name_kana,
                    di.email as email, di.tel_number as tel_number, di.user_address as user_address,
                    (phi.product_count*phi.price) as subtotal
                    FROM purchase_history_info as phi LEFT JOIN product_info as pi ON phi.product_id=pi.product_id
                    LEFT JOIN destination_info as di ON phi.destination_id=di.id
                    WHERE phi.user_id=? ORDER BY regist_date DESC';
            $args[] = $login_user_id;
            $stmt = $dbh->exec($sql, $args);
            $dbh = null;

            $purchaseHistoryList = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $purchaseHistoryList;
        } catch (Exception $e) {
            echo 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
    }
    // 購入情報を追加
    public function addPurchaseHistory($login_user_id, $product_id, $product_count, $price, $destination_id)
    {
        try {
            $dbh = new ConnectDB();
            $count = 0;
            $sql = 'INSERT INTO purchase_history_info (user_id, product_id, product_count, price, destination_id, regist_date, update_date)
                    VALUES (?, ?, ?, ?, ?, now(), now())';
            $args[] = $login_user_id;
            $args[] = $product_id;
            $args[] = $product_count;
            $args[] = $price;
            $args[] = $destination_id;
            $count = $dbh->exec($sql, $args);
            $dbh = null;

            return $count;
        } catch (Exception $e) {
            echo 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
    }
    // 全ての購入情報を削除
    public function deleteAllPurchaseHistory($login_user_id)
    {
        try {
            $dbh = new ConnectDB();
            $count = 0;
            $sql = "DELETE FROM purchase_history_info WHERE user_id=?";
            $args[] = $login_user_id;
            $count = $dbh->exec($sql, $args);
            $dbh = null;

            return $count;
        } catch (Exception $e) {
            echo 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
    }
}
