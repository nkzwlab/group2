<?php
    function showResult($resultArray) {
        echo '結果は以下に！' . '<br>';
        foreach ( $resultArray as $ele ) {
            echo $ele;
            echo '<br>';
        }
        echo '<br>';
    }
?>
