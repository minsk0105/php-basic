<?php
    include_once "../DB/config.php";
    include_once "../DB/db_conn.php";

    $name = $user_id;
    $pass = password_hash($_POST['write_pass'], PASSWORD_DEFAULT);
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = date('Y-m-d');

    if (isset($_POST['lock_post'])) {
        $lock_post = '1';
    } else {
        $lock_post = '0';
    }

    $reset_unique = sql_query("ALTER TABLE board AUTO_INCREMENT = 1");
    // 특정 레코드를 삭제하면 삭제한 고유 번호가 공백이 생기기 때문에 1로 초기화

    $sql = sql_query("INSERT
            board
        SET
            name = '$name',
            pass = '$pass',
            title = '$title',
            content = '$content',
            date = '$date',
            hit = '0',
            lock_post = '$lock_post'
    ");

    mysqli_close($conn);

    if ($sql) { ?>
        <script>
            alert ("글이 성공적으로 작성되었습니다.");
            location.href = "../Screen/list.php";
        </script>
    <?php
        exit();    
    } else {
        echo "알 수 없는 오류 발생";
        exit();
    }
?>