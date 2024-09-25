<?php
    $conn = mysqli_connect('localhost', 'root', '', 'opentutorials');

    $filtered = array (
        'name' => mysqli_real_escape_string($conn, $_POST['name']),
        'profile' => mysqli_real_escape_string($conn, $_POST['profile']),
    );

    $sql = "
        INSERT INTO author (name, profile)
            VALUES (
                '{$filtered['name']}',
                '{$filtered['profile']}'
            )
    ";
    $result = mysqli_query($conn, $sql);
    if ($result === false) {
        // $result에서 에러가 발생하면 자동으로 false로 지정되는 특징이 있음
        echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.';
        error_log(mysqli_error($conn));
    } else { ?>
        <script>
            alert("정보가 추가되었습니다.");
            location.href = "author.php";
        </script>
    <?php } ?>