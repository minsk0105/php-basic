<?php
    include_once "../DB/db_conn.php";

    $id = $_POST['id'];
    $pass = $_POST['pass'];

    $sql = sql_query("SELECT * FROM user WHERE id = '$id'");
    $isset_user = mysqli_num_rows($sql); // 유저 등록 여부

    if (!$isset_user) { ?>
        <script>
            alert ("등록되지 않은 아이디입니다.");
            history.back();
        </script>
    <?php } else {
        $row = mysqli_fetch_array($sql);
        $hashed_pass = $row['pass'];

        mysqli_close($conn);

        if (password_verify($pass, $hashed_pass)) {
            echo "
                <script>
                    alert ('로그인 되었습니다.');
                    location.href = '../Screen/main.php';
                </script>
            ";
            session_start(); // $_SESSION 전역변수 사용
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            exit();
        } else { ?>
            <script>
                alert ("비밀번호가 일치하지 않습니다.");
                history.back();
            </script>
        <?php
            exit();
        }
    }
?>