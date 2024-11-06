<?php
    include_once "../DB/db_conn.php";
    
    $user_id = $_POST['id'];
    $user_pass = password_hash($_POST['pass_check'], PASSWORD_DEFAULT);
    $user_name = $_POST['name'];
    $user_gender = $_POST['gender'];
    $user_phone = $_POST['phone'];
    $user_email = $_POST['email'];

    $sql = sql_query("INSERT user
        SET
            id = '$user_id',
            pass = '$user_pass',
            name = '$user_name',
            gender = '$user_gender',
            phone = '$user_phone',
            email = '$user_email'
    ");

    mysqli_close($conn);

    if ($sql) { ?>
        <script>
            alert ("회원가입이 성공적으로 완료되었습니다.");
            location.href = "../Screen/login.php";
        </script>
    <?php
        exit();
    } else {
        echo "일시적인 오류";
        exit();
    }
?>