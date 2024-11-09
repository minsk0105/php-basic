<?php
    include_once "../DB/db_conn.php";

    $idx = $_GET['idx'];

    $sql = sql_query("DELETE FROM board WHERE idx = '$idx'");
    mysqli_close($conn);

    if ($sql) { ?>
        <script>
            alert ("게시글이 삭제되었습니다.");
            location.href = "../Screen/list.php";
        </script>
    <?php
        exit();
    } else {
        echo "문제가 발생하였습니다.";
        exit();
    }
?>