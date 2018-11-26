<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/common/ConnectDB.php');

class MCategory
{
    protected $id;
    protected $category_id;
    protected $category_name;
    protected $category_description;
    protected $regist_date;
    protected $update_date;
    // 商品カテゴリーのリストを取得
    public function getMCategoryList()
    {
        try {
            $dbh = new ConnectDB();
            $sql = 'SELECT * FROM m_category';
            $stmt = $dbh->select($sql);
            $dbh = null;

            $product = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $product;
        } catch (Exception $e) {
            echo 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
    }
}
