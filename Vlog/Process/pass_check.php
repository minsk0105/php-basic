<?php
    include_once "../DB/config.php";
    include_once "../DB/db_conn.php";
    
    $pass = $_POST['pass_check'];
    $write_idx = $_GET['idx'];

    $sql = sql_query("SELECT * FROM board WHERE idx = $write_idx");
    $row = mysqli_fetch_array($sql);

    mysqli_close($conn);

    $db_pass = $row['pass'];

    if (password_verify($pass, $db_pass)) { ?>
        <script>
            location.replace("../Screen/read.php?idx=<?= $row['idx'] ?>");
        </script>
    <?php
        exit();
    } else { ?>
        <script>
            alert ("비밀번호가 일치하지 않습니다.");
            history.back();
        </script>
    <?php
        exit();
    }
?>