<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/common/ConnectDB.php');

class Destination
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
    // ログインユーザーの宛先情報を一つ取得
    public function getDestination($id)
    {
        try {
            $dbh = new ConnectDB();
            $sql = 'SELECT * FROM destination_info WHERE id=?';
            $args[] = $id;
            $stmt = $dbh->exec($sql, $args);
            $dbh = null;

            $destinationList = $stmt->fetch(PDO::FETCH_ASSOC);

            return $destinationList;
        } catch (Exception $e) {
            echo 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
    }
    // ログインユーザーの宛先情報を全て取得
    public function getAllDestination($login_user_id)
    {
        try {
            $dbh = new ConnectDB();
            $sql = 'SELECT * FROM destination_info WHERE user_id=?';
            $args[] = $login_user_id;
            $stmt = $dbh->exec($sql, $args);
            $dbh = null;

            $destinationList = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $destinationList;
        } catch (Exception $e) {
            echo 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
    }
    // 宛先情報を追加
    public function addDestination($user_id, $family_name, $first_name, $family_name_kana, $first_name_kana, $email, $tel_number, $user_address)
    {
        try {
            $dbh = new ConnectDB();
            $count = 0;
            $sql = 'INSERT INTO destination_info (user_id, family_name, first_name, family_name_kana, first_name_kana, email, tel_number, user_address, regist_date, update_date)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, now(), now())';
            $args[] = $user_id;
            $args[] = $family_name;
            $args[] = $first_name;
            $args[] = $family_name_kana;
            $args[] = $first_name_kana;
            $args[] = $email;
            $args[] = $tel_number;
            $args[] = $user_address;
            $count = $dbh->exec($sql, $args);
            $dbh = null;

            return $count;
        } catch (Exception $e) {
            echo 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
    }
    // 宛先情報を修正
    public function modifyDestination($id, $family_name, $first_name, $family_name_kana, $first_name_kana, $email, $tel_number, $user_address)
    {
        try {
            $dbh = new ConnectDB();
            $count = 0;
            $sql = 'UPDATE destination_info set family_name=?, first_name=?, family_name_kana=?, first_name_kana=?, email=?, tel_number=?, user_address=?, update_date=now()
                    WHERE id=?';
            $args[] = $family_name;
            $args[] = $first_name;
            $args[] = $family_name_kana;
            $args[] = $first_name_kana;
            $args[] = $email;
            $args[] = $tel_number;
            $args[] = $user_address;
            $args[] = $id;
            $count = $dbh->exec($sql, $args);
            $dbh = null;

            return $count;
        } catch (Exception $e) {
            echo 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
    }
    // 宛先情報を削除
    public function deleteDestination($id)
    {
        try {
            $dbh = new ConnectDB();
            $count = 0;
            $sql = "DELETE FROM destination_info WHERE id=?";
            $args[] = $id;
            $count = $dbh->exec($sql, $args);
            $dbh = null;

            return $count;
        } catch (Exception $e) {
            echo 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
    }
}
