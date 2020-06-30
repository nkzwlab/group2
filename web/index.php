<?php
    require('./SetDB.php');
    require('./DBControl.php');
    require('./Visual.php')
?>

<?php
    // phpinfo();
    $sDB = new SetDB();
    $connection = $sDB->getConnectionStatus();

    if($connection) {
        $control = new DBControl($sDB->getPDO());

        $result = $control->listAll('books');
        showResult($result);

        $result = $control->search('hey');
        showResult($result);
    } else {
        echo 'Failed to connect to DB';
    }
?>
