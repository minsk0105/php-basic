<?php
    include "../DB/config.php";
    include "../DB/db_conn.php";

    $name = $user_id;
    $date = date('Y-m-d');
    $user_pw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
    $title = $_POST['title'];
    $content = $_POST['content'];

    $write_sql = "INSERT
            board
        SET
            name = '".$name."',
            pass = '".$user_pw."',
            title = '".$title."',
            content = '".$content."',
            date = '".$date."'
    ";
    $result = mysqli_query($conn, $write_sql);
?>

<script>
    alert ("글이 성공적으로 작성되었습니다.");
    location.href = "../Screen/list.php";
</script>