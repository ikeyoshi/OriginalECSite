<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/common/ConnectDB.php');

class Product
{
    protected $id;
    protected $product_id;
    protected $product_name;
    protected $product_name_kana;
    protected $product_description;
    protected $category_id;
    protected $price;
    protected $image_file_path;
    protected $image_file_name;
    protected $release_date;
    protected $status;
    protected $regist_date;
    protected $update_date;
    // 特定の商品情報を取得
    public function getProduct($product_id)
    {
        try {
            $dbh = new ConnectDB();
            $sql = 'SELECT * FROM product_info WHERE product_id=?';
            $args[] = $product_id;
            $stmt = $dbh->exec($sql, $args);
            $dbh = null;

            $product = $stmt->fetch(PDO::FETCH_ASSOC);

            return $product;
        } catch (Exception $e) {
            echo 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
    }
    // 特定の商品名が存在するかチェック
    public function existProductName($product_name)
    {
        try {
            $dbh = new ConnectDB();
            $sql = 'SELECT * FROM product_info WHERE product_name=?';
            $args[] = $product_name;
            $stmt = $dbh->exec($sql, $args);
            $dbh = null;

            $product = $stmt->fetch(PDO::FETCH_ASSOC);

            return $product;
        } catch (Exception $e) {
            echo 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
    }
    // 特定の商品名(かな)が存在するかチェック
    public function existProductNameKana($product_name_kana)
    {
        try {
            $dbh = new ConnectDB();
            $sql = 'SELECT * FROM product_info WHERE product_name_kana=?';
            $args[] = $product_name_kana;
            $stmt = $dbh->exec($sql, $args);
            $dbh = null;

            $product = $stmt->fetch(PDO::FETCH_ASSOC);

            return $product;
        } catch (Exception $e) {
            echo 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
    }
    // 全種類の商品情報を取得
    public function getAllProduct()
    {
        try {
            $dbh = new ConnectDB();
            $sql = 'SELECT * FROM product_info WHERE 1';
            $stmt = $dbh->select($sql);
            $dbh = null;

            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $products;
        } catch (Exception $e) {
            echo 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
    }
    // 商品情報を登録
    public function registProduct($product_id, $product_name, $product_name_kana, $product_description, $category_id, $price, $image_file_path, $image_file_name, $release_date, $release_company, $status)
    {
        try {
            $dbh = new ConnectDB();
            $sql = 'INSERT INTO product_info (product_id, product_name, product_name_kana, product_description, category_id, price, image_file_path, image_file_name, release_date, release_company, status, regist_date, update_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now(), now())';
            $args[] = $product_id;
            $args[] = $product_name;
            $args[] = $product_name_kana;
            $args[] = $product_description;
            $args[] = $category_id;
            $args[] = $price;
            $args[] = $image_file_path;
            $args[] = $image_file_name;
            $args[] = $release_date;
            $args[] = $release_company;
            $args[] = $status;
            $stmt = $dbh->exec($sql, $args);
            $dbh = null;

            return $stmt;
        } catch (Exception $e) {
            echo 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
    }
    // 商品を検索
    public function searchProduct($keywordsList)
    {
        try {
            $dbh = new ConnectDB();
            $sql = 'SELECT * FROM product_info WHERE';
            $initializeFlag = true;
            foreach ($keywordsList as $keyword) {
                if ($initializeFlag) {
                    $sql .= " (product_name like '%".$keyword."%' or product_name_kana like '%".$keyword."%')";
                    $initializeFlag = false;
                } else {
                    $sql .= " or (product_name like '%".$keyword."%' or product_name_kana like '%".$keyword."%')";
                }
            }
            $stmt = $dbh->select($sql);
            $dbh = null;

            $product = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $product;
        } catch (Exception $e) {
            echo 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
    }
    // 商品をカテゴリーを指定して検索
    public function searchProductByCategoryId($keywordsList, $category_id)
    {
        try {
            $dbh = new ConnectDB();
            $sql = 'SELECT * FROM product_info WHERE';
            $initializeFlag = true;
            foreach ($keywordsList as $keyword) {
                if ($initializeFlag) {
                    $sql .= " category_id=".$category_id." and ((product_name like '%".$keyword."%' or product_name_kana like '%".$keyword."%')";
                    $initializeFlag = false;
                } else {
                    $sql .= " or (product_name like '%".$keyword."%' or product_name_kana like '%".$keyword."%')";
                }
            }
            $sql .= ")";
            $stmt = $dbh->select($sql);
            $dbh = null;

            $product = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $product;
        } catch (Exception $e) {
            echo 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
    }
    // 商品情報を変更
    public function modifyProduct($product_id, $product_name, $product_name_kana, $product_description, $category_id, $price, $image_file_path, $image_file_name, $release_date, $release_company, $status, $id)
    {
        try {
            $dbh = new ConnectDB();
            $sql = 'UPDATE product_info set product_id=?, product_name=?, product_name_kana=?, product_description=?, category_id=?, price=?, image_file_path=?, image_file_name=?, release_date=?, release_company=?, status=?, update_date=now()
                    WHERE id=?';
            $args[] = $product_id;
            $args[] = $product_name;
            $args[] = $product_name_kana;
            $args[] = $product_description;
            $args[] = $category_id;
            $args[] = $price;
            $args[] = $image_file_path;
            $args[] = $image_file_name;
            $args[] = $release_date;
            $args[] = $release_company;
            $args[] = $status;
            $args[] = $id;
            $stmt = $dbh->exec($sql, $args);
            $dbh = null;

            return $stmt;
        } catch (Exception $e) {
            echo 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
    }
    // 商品を削除
    public function deleteProduct($product_id)
    {
        try {
            $dbh = new ConnectDB();
            $count = 0;
            $sql = "DELETE FROM product_info WHERE product_id=?";
            $args[] = $product_id;
            $count = $dbh->exec($sql, $args);
            $dbh = null;

            return $count;
        } catch (Exception $e) {
            echo 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
    }
}
