<?php

try {
    // データベースに接続
    $db = 'mysql:host=db;dbname=group2;charset=utf8';
    $username = 'root';
    $password = 'badpassword';
    $pdo = new PDO($db, $username, $password);

    echo 'mysqlに接続成功';

} catch (PDOException $e) {
    echo "接続失敗：" . $e->getMessage();
    echo '<br>';
    exit();
}


$pdo->query (
    'create table if not exists books (
    id int AUTO_INCREMENT primary key,
    name varchar(255) not null
    );'
);

?>
