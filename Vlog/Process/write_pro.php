<?php
    include "../DB/config.php";
    include "../DB/db_conn.php";

    $name = $user_id;
    $date = date('Y-m-d');
    $user_pw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
    $title = $_POST['title'];
    $content = $_POST['content'];
    if (isset($_POST['lock_post'])) {
        $lock_post = '1';
    } else {
        $lock_post = '0';
    }

    $auto_sql = "ALTER TABLE board AUTO_INCREMENT = 1"; // AUTO_INCREMENT 값 초기화 (삭제 시 번호가 비지 않게 하기 위해서)
    $auto_query = mysqli_query($conn, $auto_sql);

    $write_sql = "INSERT
            board
        SET
            name = '".$name."',
            pass = '".$user_pw."',
            title = '".$title."',
            content = '".$content."',
            date = '".$date."',
            lock_post = '".$lock_post."'
    ";
    $result = mysqli_query($conn, $write_sql);
?>

<script>
    alert ("글이 성공적으로 작성되었습니다.");
    location.href = "../Screen/list.php";
</script>