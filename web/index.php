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

    } else {
        echo 'Failed to connect to DB';
    }
?>


<!DOCTYPE html>
<html lang = “ja”>
    <head>
        <meta charset = “UFT-8”>
        <title>勉強本</title>
    </head>
    <body>
        <input type="button" value="本を追加" onclick="document.getElementById('book').style.display='block'">
        <h1>一覧</h1>
        <?php
            $result = $control->listAll('books');
            showResult($result);
        ?>

        <h1>検索</h1>
        <form action = “index.php” method = 'GET'>
        <input type = 'text' name ='searchWord'><br/>
        <input type = 'submit' value ='送信'>

        <h2>検索結果</h2>
        <?php
            $searchWord = $_GET['searchWord'];
            $result = $control->search($searchWord);
            showResult($result);
        ?>
        <div id="book">
            <h2>本を追加</h2>
            <form action = "index.php" method = 'POST'>
            <input type="text" name="title" value="<?php echo $title;?>">
            <input type="submit" value="追加">
            <?php
                $result = $control->add('books');
            ?>
        </form>
    </body>
</html>
