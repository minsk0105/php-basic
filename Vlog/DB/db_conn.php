<?php
    $conn = mysqli_connect('localhost', 'root', '', 'vlog');

    // 쿼리 실행 코드 간소화
    function sql_query($sql) {
        global $conn;
        return mysqli_query($conn, $sql);
    }
?>