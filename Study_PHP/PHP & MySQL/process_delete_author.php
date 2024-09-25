<?php
    $conn = mysqli_connect('localhost', 'root', '', 'opentutorials');

    settype($_POST['id'], 'integer');
    $filtered = array (
        'id' => mysqli_real_escape_string($conn, $_POST['id'])
    );

    $sql = "
        DELETE FROM topic WHERE author_id = {$filtered['id']}
    ";
    mysqli_query($conn, $sql);

    $sql = "
        DELETE FROM author WHERE id = {$filtered['id']}
    ";

    $result = mysqli_query($conn, $sql);
    if ($result === false) {
        // $result에서 에러가 발생하면 자동으로 false로 지정되는 특징이 있음
        echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.';
        error_log(mysqli_error($conn));
    } else { ?>
        <script>
            alert("삭제에 성공했습니다.");
            location.href = 'author.php';
        </script>
    <?php } ?>