<?php
    include_once "../DB/db_conn.php";

    $id = $_POST['id'];
    $pass = password_hash($_POST['pass_check'], PASSWORD_DEFAULT); // 비밀번호 해쉬값으로 암호화
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $sql = "INSERT user
        SET
            id = '$id',
            pass = '$pass',
            name = '$name',
            gender = '$gender',
            phone = '$phone',
            email = '$email'
    ";
    
    query($sql);

    echo '
        <script>
            alert ("회원가입이 완료되었습니다.");
            location.href = "../Screen/main.php";
        </script>
    ';
?>