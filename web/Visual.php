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

    function showCommentList($commentArray) {
        if (is_null($commentArray)) {
            return;
        }

        echo 'コメント一覧' . '<br>';
        foreach ( $commentArray as $ele ) {
            echo $ele;
            echo '<br>';
        }
        echo '<br>';
    }
?>
