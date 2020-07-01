<?php
    // 本の一覧・検索機能
    class DBControl {
        private $pdo;

        function __construct(&$pdo) {
            $this->pdo =& $pdo;
        }

        function listAll($tableName='books') {
            $myQuery = 'SELECT * FROM ' . $tableName . ';';
            $result = array();

            try {
                foreach ( $this->pdo->query($myQuery) as $row ) {
                    array_push($result, $row['name'] . '//' . $row['rate']);
                }
            } catch (\Throwable $th) {
                throw $th;
            }
            return $result;
        }

        function search($word, $tableName='books', $type='name') {
            if (is_null($word) || $word == ''){
                return NULL;
            }

            $myQuery = 'SELECT * FROM ' . $tableName . ' WHERE '. $type . ' LIKE "%' . $word . '%";';
            $result = array();

            try {
                foreach ( $this->pdo->query($myQuery) as $row ) {
                    array_push($result, $row['name']);
                }
            } catch (\Throwable $th) {
                throw $th;
            }

            return $result;
        }

        function add($word, $tableName='books', $type='name') {
            if (is_null($word) || $word == ''){
                return NULL;
            }
            $myQuery = 'INSERT INTO ' . $tableName . ' (' . $type . ') VALUES ("'. $word .'");';
            $this->pdo->query($myQuery);
        }

        function rate_Add($choose_book,$rate) {
            if (is_null($rate) || $rate == ''){
                return NULL;
            }
            $myQuery = 'INSERT INTO books (rate) VALUES ("' . $rate . '")';
            #$myQuery = 'UPDATE books SET name = "' . $rate . '"' . ' WHERE name = "' . $choose_book . '"';
            #$myQuery = 'UPDATE books SET name = "' . $rate . '"' . ' WHERE id = 3';
            $this->pdo->query($myQuery);
        }
    }

?>
