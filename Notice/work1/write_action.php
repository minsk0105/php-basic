<?php
    $conn = mysqli_connect('localhost','root','','notice_board');

    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $born = $_POST['born'];
    $today = date("Y-m-d H:i:s");

    $sql = "
        INSERT INTO board (name, tel, born, date)
            VALUES (
                '{$name}',
                '{$tel}',
                '{$born}',
                '{$today}'
            )
    ";
    $result = mysqli_query($conn, $sql);
    
    if ($result) { ?>
        <script>
            alert("예약이 완료되었습니다.");
            location.href = "write.php";
        </script>
    <?php } ?>