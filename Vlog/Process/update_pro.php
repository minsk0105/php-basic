<?php

use LDAP\Result;

    include "../DB/config.php";
    include "../DB/db_conn.php";

    $idx = $_POST['idx']; // hidden 값
    $user_pass = password_hash($_POST['pw'], PASSWORD_DEFAULT);
    $date = date('Y-m-d');

    $sql = "UPDATE board
        SET
            date = '".$date."',
            pass = '".$user_pass."',
            title = '".$_POST['title']."',
            content = '".$_POST['content']."'
        WHERE
            idx = '".$idx."'
    ";
    $result = mysqli_query($conn, $sql);

    if ($result) { ?>
        <script>
            alert ("수정되었습니다.");
            location.href = "../../Screen/list.php";
        </script>
    <?php } else {
        echo "fail/error";
    } ?>