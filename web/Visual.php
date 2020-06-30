<?php
    function showResult($resultArray) {
        if (is_null($resultArray)) {
            return;
        }

        echo '結果は以下に！' . '<br>';
        foreach ( $resultArray as $ele ) {
            echo $ele;
            echo '<br>';
        }
        echo '<br>';
    }
?>
