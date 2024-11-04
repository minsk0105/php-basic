<?php
    $db_id = 'root';
    $db_pw = '';
    $db_name = 'vlog';
    $db_domain = 'localhost';
    $conn = mysqli_connect($db_domain, $db_id, $db_pw, $db_name);

    // 쿼리를 실행할 간소화된 코드
    function query($sql) {
        global $conn; // global을 통해 $conn 전역 변수를 함수 내부에서 사용할 수 있도록 해줌
        return $conn -> query($sql); // === mysqli_query($conn, $sql);
    }
?>