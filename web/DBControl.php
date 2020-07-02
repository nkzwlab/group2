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

        /*function rate_Add($choose_book,$rate) {
            echo $choose_book;
            #$result = listAll('books);
            #$book_id = array_search($choose_book,$result);
            #echo $book_id;
            if (is_null($rate) || $rate == ''){
                return NULL;
            }
            $myQuery = 'UPDATE books SET rate = "' . $rate . '"' . ' WHERE id = '$book_id;
            #$myQuery = 'UPDATE books SET rate = "' . $rate . '"' . ' WHERE id = 2';
            $this->pdo->query($myQuery);
        }*/
        
        function rate_Add($choose_book,$rate,$tableName='books') {
            $myQuery = 'SELECT * FROM ' . $tableName . ';';
            $result = array();
            try {
                foreach ( $this->pdo->query($myQuery) as $row ) {
                    array_push($result, $row['name'] . '//' . $row['rate']);
                }
            } catch (\Throwable $th) {
                throw $th;
            }
            
            $book_id = array_search($choose_book,$result);
            $book_id = intval($book_id) + 1;
            #echo $book_id;
            if (is_null($rate) || $rate == ''){
                return NULL;
            }
            $myQuery = 'UPDATE books SET rate = "' . $rate . '"' . ' WHERE id = ' . intval($book_id);
            #$myQuery = 'UPDATE books SET rate = "' . $rate . '"' . ' WHERE id = 3';
            $this->pdo->query($myQuery);
        }
    }
?>
