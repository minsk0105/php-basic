<?php
    $conn = mysqli_connect('localhost', 'root' , '1234', 'opentutorials');
    echo "<h1>Single Row</h1>";
    $sql = "
        SELECT * FROM topic WHERE id = 8
    ";
    $result = mysqli_query($conn, $sql);
    // var_dump($result);
    // var_dump($result->num_rows);
    // 실행한 쿼리를 읽어옴.

    // <1 row> 1개
    $row = mysqli_fetch_array($result);
    // print_r($row);
    // mysqli_query를 통해 얻은 레코드 값을 배열로 1개 씩 리턴
    echo '<h2>'.$row['title'].'</h2>'; // 테이블명
    echo $row['description']; // 텍스트

    // <all row> 모두
    echo "<h1>Multi Row</h1>";
    $sql = "
    SELECT * FROM topic
    ";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        // $row의 값이  NULL이면 false로 지정함
        // $row값이 NULL이면 false이기 때문에 while문이 종료됨
        // 따라서 더이상 리턴할 값이 없으면 자동으로 종료됨
        echo '<h2>'.$row['title'].'</h2>';
        echo $row['description'];
    }
?>