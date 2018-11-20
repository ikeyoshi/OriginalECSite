<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/common/ConnectDB.php');

class User
{
    protected $id;
    protected $user_id;
    protected $password;
    protected $family_name;
    protected $first_name;
    protected $family_name_kana;
    protected $first_name_kana;
    protected $sex;
    protected $email;
    protected $status;
    protected $logined;
    protected $regist_date;
    protected $update_date;


    public function getUser($id)
    {
        try {
            $dbh = new ConnectDB();
            $sql = 'SELECT * FROM user_info WHERE id=?';
            $args[] = $id;
            $stmt = $dbh->exec($sql, $args);
            $dbh = null;

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            return $user;
        } catch (Exception $e) {
            echo 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
    }

    public function existUser($user_id, $password)
    {
        try {
            $dbh = new ConnectDB();
            $sql = 'SELECT * FROM user_info WHERE user_id=? AND password=?';
            $args[] = $user_id;
            $args[] = $password;
            $stmt = $dbh->exec($sql, $args);
            $dbh = null;

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            return $user;
        } catch (Exception $e) {
            echo 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
    }

    public function getAllUser()
    {
        try {
            $dbh = new ConnectDB();
            $sql = 'SELECT * FROM user_info WHERE 1';
            $stmt = $dbh->execute($sql, $args);
            $dbh = null;

            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $users;
        } catch (Exception $e) {
            echo 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
    }

    public function createUser($user_id, $password, $family_name, $first_name, $family_name_kana, $first_name_kana, $sex, $email, $status)
    {
        try {
            $dbh = new ConnectDB();
            $sql = 'INSERT INTO user_info (user_id, password, family_name, first_name, family_name_kana, first_name_kana, sex, email, status, logined, regist_date, update_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 0, now(), now())';
            $args[] = $user_id;
            $args[] = $password;
            $args[] = $family_name;
            $args[] = $first_name;
            $args[] = $family_name_kana;
            $args[] = $first_name_kana;
            $args[] = $sex;
            $args[] = $email;
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
