<?php
    require('./SetDB.php');
    require('./DBControl.php');
?>

<?php
    // phpinfo();
    $sDB = new SetDB();
    $connection = $sDB->getConnectionStatus();

    if($connection) {
        $control = new DBControl($sDB->getPDO());

        $result = $control->listAll('books');
        foreach ( $result as $ele ) {
            echo $ele;
            echo '<br>';
        }

        $result = $control->search('hey');
        echo '<br>' . '検索結果' . '<br>';
        foreach ( $result as $ele ) {
            echo $ele;
            echo '<br>';
        }

    } else {
        echo 'Failed to connect to DB';
    }
?>
