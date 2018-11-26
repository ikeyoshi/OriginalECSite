<?php

class ConnectDB
{
    //定数の宣言
    const DBNAME = 'original_ecsite_php';
    const HOST = 'localhost';
    const CHARSET = 'utf8';
    const USER = 'root';
    const PASSWORD = 'mysql';

    // データベースに接続
    public function pdo()
    {
        $dsn = 'mysql:dbname='.self::DBNAME.';host='.self::HOST.';charset='.self::CHARSET;
        $user = self::USER;
        $password = self::PASSWORD;
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }

    // SQL文(引数無し)
    public function select($sql)
    {
        $tmp = $this->pdo();
        $stmt = $tmp->query($sql);
        return $stmt;
    }

    // SQL文(引数有り)
    public function exec($sql, $args)
    {
        $tmp = $this->pdo();
        $stmt = $tmp->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
}
