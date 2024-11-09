<?php
    include_once "../DB/config.php";
    include_once "../DB/db_conn.php";

    $idx = $_POST['thisIdx'];
    $dat_user = $_POST['datUser'];
    $dat_con = $_POST['content'];

    $sql = sql_query("INSERT
            comment
        SET
            con_num = '$idx',
            name = '$dat_user',
            content = '$dat_con',
            date = NOW()
    ");

    mysqli_close($conn);

    if ($sql) { ?>
        <script>
            alert ("댓글이 작성되었습니다.");
            history.back();
        </script>
    <?php
        exit();
    } else {
        echo "에러 발생";
        exit();
    }
?>