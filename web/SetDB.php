<?php

    class SetDB {
        private $pdo;
        private $connection;

        public function __construct() {
            try {
                // データベースに接続
                $db = 'mysql:host=db;dbname=group2;charset=utf8';
                $username = 'root';
                $password = 'badpassword';
                $this->pdo = new PDO($db, $username, $password);

            } catch (PDOException $e) {
                echo "接続失敗：" . $e->getMessage();
                echo '<br>';
                $this->connection = FALSE;
                exit();
            }


            $this->pdo->query (
                'create table if not exists books (
                id int AUTO_INCREMENT primary key,
                name varchar(255) not null
                );'
            );

            $this->connection = TRUE;
        }

        function getConnectionStatus() {
            return $this->connection;
        }

        function getPDO() {
            return $this->pdo;
        }
    }

?>
