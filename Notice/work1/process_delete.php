<?php
    $conn = mysqli_connect('localhost', 'root', '', 'notice_board');

    settype($_POST['id'], 'integer');
    $filtered = array (
        'id' => mysqli_real_escape_string($conn,$_POST['id'])
    );

    $del_sql = "DELETE FROM board WHERE id = {$filtered['id']}";
    
    $result = mysqli_query($conn, $del_sql);
    if ($result === false) { ?>
        <script>
            alert("삭제하는 과정에서 문제가 발생했습니다.");
        </script>
    <?php } else { ?>
        <script>
            alert("사용자의 정보가 삭제되었습니다.");
            location.href = "write.php";
        </script>
    <?php }?>