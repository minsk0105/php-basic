<?php
    include_once "../DB/config.php";
    include_once "../DB/db_conn.php";

    $idx = $_POST['idx'];
    $new_pass = $_POST['write_pass'];

    if (isset($_POST['lock_post'])) {
        $lock_post = '1';
    } else {
        $lock_post = '0';
    }

    $sql = sql_query("SELECT * FROM board WHERE idx = $idx");
    $row = mysqli_fetch_array($sql);

    if (password_verify($new_pass, $row['pass'])) {
        $new_pass = $row['pass'];
    }
    // 비밀번호를 수정하지 않았을 때
    else if ($new_pass === "") {
        $new_pass = $row['pass'];
    } else {
        $new_pass = password_hash($_POST['write_pass'], PASSWORD_DEFAULT);
    }

    $new_title = $_POST['title'];
    $new_content = $_POST['content'];
    $date = date('Y-m-d');

    $update_sql = sql_query("UPDATE
            board
        SET
            pass = '$new_pass',
            title = '$new_title',
            content = '$new_content',
            date = '$date',
            lock_post = '$lock_post'
        WHERE
            idx = '$idx'
    ");

    if ($update_sql) { ?>
        <script>
            alert ("글 정보가 수정되었습니다.");
            location.href = "../../Screen/read.php?idx=<?= $row['idx'] ?>";
        </script>
    <?php
        exit();    
    } else {
        echo "알 수 없는 오류 발생";
        exit();
    }

?>