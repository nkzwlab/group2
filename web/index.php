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

        $new = $_GET['newbook'];
        $control->add($new);
        
        $choose_book = $_GET['choose_book'];
        $rate = $_GET['rate'];
        $control->rate_Add($choose_book,$rate);
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
        </form>

        <h2>検索結果</h2>
        <?php
            $searchWord = $_GET['searchWord'];
            $result = $control->search($searchWord);
            showResult($result);
        ?>
        <div id="book">
            <h2>本を追加</h2>
            <form action = “index.php” method = 'GET'>
                <input type="text" name="newbook">
                <input type="submit" value="追加">
            </form>

        <h1>評価</h1>
        <form action = “index.php” method = 'GET'>
        <select name="choose_book">
        <?php
            $result = $control->listAll('books');
            foreach($result as $result) {
                print('<option value="' . $result . '">' . $result . '</option>');
                }
            ?>
        </select>
       <select name="rate">
       <?php
           $rate_num = array('☆1','☆2','☆3','☆4','☆5');
           foreach($rate_num as $rate_num) {
               print('<option value="' . $rate_num . '">' . $rate_num . '</option>');
               }
           ?>
       </select>
        <input type="submit" value="評価追加">
        </form>
    </body>
</html>
