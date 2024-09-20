<?php
    $conn = mysqli_connect('localhost','root','','notice_board');
    $sql = "
        SELECT * FROM board
    ";
    $read = mysqli_query($conn, $sql);
    $list = '';
    if ($read) {
        while ($row = mysqli_fetch_array($read)) {
            $list = $list."
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['tel']}</td>
                    <td>{$row['born']}</td>
                    <td>{$row['date']}</td>
                </tr>
            ";
        }
    } else {
        echo "쿼리 실패 : ". mysqli_error($conn);
    }
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="write_action.php" method="post">
        <main>
            <table>
                <tr>
                    <td class="title">게시판</td>
                </tr>
                <tr>
                    <table class="list-table">
                        <tr>
                            <td>예약번호</td>
                            <td>성명</td>
                            <td>전화번호</td>
                            <td>생년월일</td>
                            <td>예약일시</td>
                        </tr>

                        <?=$list?>

                        <tr>
                            <td>예약번호</td>
                            <td>
                                <input type="text" name="name" id="name">
                            </td>
                            <td>
                                <input type="text" name="tel" id="tel">
                            </td>
                            <td>
                                <input type="text" name="born" id="born">
                            </td>
                            <td>예약일시</td>
                        </tr>
                    </table>
                    <input type="submit" value="예약" id="submit">
                </tr>
            </table>
        </main>
    </form>

    <script src="write.js"></script>
</body>
</html>