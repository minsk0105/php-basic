<?php $conn = mysqli_connect('localhost','root','','basic') ?> <!-- mysql, mariadb 서버 연결 -->
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판(notice)</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Title</th>
            <th>Date</th>
        </tr>

        <?php
            $sql = "SELECT * FROM notice"; // 불러올 테이블 데이터
            $result = mysqli_query($conn, $sql); //데이터를 불러와 실행
            while($row = mysqli_fetch_array($result)) { //$result 값을 순차적으로 리턴
                echo "
                    <tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['title']}</td>
                        <td>{$row['date']}</td>
                    </tr>
                ";
            }
        ?>

        <form action="create-process.php" method='post'>
            <tr>
                <td>아이디</td>
                <td><input type="text" name='name' placeholder='Name'></td>
                <td><input type="text" name='title' placeholder='Title'></td>
                <td>날짜</td>
                <td><input type="submit" value='complete'></td>
            </tr>
        </form>
    </table>
</body>
</html>