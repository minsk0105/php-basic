<?php
    $conn = mysqli_connect('localhost', 'root', '', 'vlog');

    $id = $_POST['id'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM user WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $num_row = mysqli_num_rows($result); // 유저 등록 여부

    if (!$num_row) { ?>
        <script>
            alert ("등록되지 않은 아이디입니다.");
            history.back();
        </script>
    <?php } else {
        $row = mysqli_fetch_array($result);
        $db_pass = $row['pass'];
        
        mysqli_close($conn); // mysqli_connect 함수를 통해 연결된 객체를 해제하는 함수 ($conn)

        if (!password_verify($pass, $db_pass)) { ?>
            <script>
                alert ("비밀번호가 일치하지 않습니다.");
                history.back();
            </script>
        <?php
            exit();
        } else {
            session_start();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            header("Location: list.php");
            exit();
        }
    }
?>