<?php
    $conn = mysqli_connect('localhost','root','','notice_board');

    settype($_POST['id'], 'integer');
    $filtered = array (
        'edit' => mysqli_real_escape_string($conn, $_POST['edit']),
        'name' => mysqli_real_escape_string($conn, $_POST['name']),
        'tel' => mysqli_real_escape_string($conn, $_POST['tel']),
        'born' => mysqli_real_escape_string($conn, $_POST['born'])
    );

    $sql = "
        UPDATE board
            SET
                name = '{$filtered['name']}',
                tel = '{$filtered['tel']}',
                born = '{$filtered['born']}'
            WHERE
                id = '{$filtered['edit']}'
    ";
    // name=edit인 hidden 타입의 인풋을 통해 전달된 수정할 데이터를 데이터베이스의 특정 id값의 컬럼을 지정해 수정하는 방식

    $result = mysqli_query($conn, $sql);

    if ($result) { ?>
        <script>
            alert("정보가 업데이트되었습니다.");
            location.href = "write.php";
        </script>
    <?php } ?>
?>