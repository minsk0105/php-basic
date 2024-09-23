<?php
    $conn = mysqli_connect('localhost', 'root', '', 'opentutorials');

    $filtered = array (
        'title' => mysqli_real_escape_string($conn, $_POST['title']),
        'description' => mysqli_real_escape_string($conn, $_POST['description'])
    );

    $sql = "
        INSERT INTO topic
            (title, description, created)
            VALUES(
                '{$filtered['title']}',
                '{$filtered['description']}',
                NOW()
            )
    ";
    $result = mysqli_query($conn, $sql);
    if ($result === false) {
        // $result에서 에러가 발생하면 자동으로 false로 지정되는 특징이 있음
        echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.';
        error_log(mysqli_error($conn));
    } else {
        // insert에 성공하면 사용자에게 성공했다는 메세지와 함께 홈으로 돌아갈 링크를 제공
        echo '성공했습니다. <a href="index.php">돌아가기</a>';
    }
    // echo $sql;
?>