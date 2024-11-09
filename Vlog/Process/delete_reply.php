<?php
    include_once "../DB/db_conn.php";

    $idx = $_POST['idx'];

    $sql = sql_query("DELETE FROM comment WHERE idx = '$idx'");

    if ($sql) { ?>
        <script>
            alert ("댓글이 삭제되었습니다.");
            history.back();
        </script>
    <?php
        exit();
    } else {
        echo "오류 발생";
        exit();
    }
?>