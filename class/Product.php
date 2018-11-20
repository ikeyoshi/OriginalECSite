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
}
