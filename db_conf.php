<?php

// データベースに接続
$db = 'mysql:host=localhost:3306;dbname=my_db_name;charset=utf8';
$username = 'root';
$password = 'password';
$pdo = new PDO ($db, $username, $password);

$pdo->query (
    'create table if not exists books (
    id int AUTO_INCREMENT primary key,
    name varchar(255) not null
    );'
);

?>
