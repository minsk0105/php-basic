<?php
    $conn = mysqli_connect('localhost','root','','notice_board');

    $id = $_POST['name'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $pw = $_POST['pw'];
    $date = date("Y-m-d H:i:s");
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시물 목록</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            cursor: default;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        table {
            border-collapse: collapse;
        }

        td {
            text-align: center;
            width: 200px;
            height: 50px;
            line-height: 50px;
            border: 1px solid gray;
        }

        thead td {
            font-size: 18px;
            font-weight: bold;
        }
        
        a {
            position: absolute;
            top: 0;
            left: 0;
            padding: 15px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <td>이름(name)</td>
                <td>제목(title)</td>
                <td>내용(content)</td>
                <td>비밀번호(password)</td>
            </tr>
        </thead>
        
        <tbody>
            <?php
                echo "
                    <tr>
                        <td>{$_POST['name']}</td>
                        <td>{$_POST['title']}</td>
                        <td>{$_POST['content']}</td>
                        <td>{$_POST['pw']}</td>
                    </tr>
                "
            ?>
        </tbody>
    </table>
    <a href="write.php">돌아가기</a>
</body>
</html>