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
                    array_push($result, $row['name']);
                }
            } catch (\Throwable $th) {
                throw $th;
            }

            return $result;
        }

        function search($word, $tableName='books', $type='name') {
            if (is_null($word)) {
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
    }

?>
