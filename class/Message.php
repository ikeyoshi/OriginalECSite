<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/index/OriginalECSitePHP/common/ConnectDB.php');

class Message
{
    protected $id;
    protected $name;
    protected $message;
    protected $regist_date;
    // メッセージを追加
    public function addMessage($name, $message)
    {
        try {
            $dbh = new ConnectDB();
            $count = 0;
            $sql = 'INSERT INTO message_info (name, message, regist_date)
                    VALUES (?, ?, now())';
            $args[] = $name;
            $args[] = $message;
            $count = $dbh->exec($sql, $args);
            $dbh = null;

            return $count;
        } catch (Exception $e) {
            echo 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
    }
}
