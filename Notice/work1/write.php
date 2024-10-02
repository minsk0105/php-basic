<?php
    $conn = mysqli_connect('localhost','root','','notice_board');
    $sql = "
        SELECT * FROM board
    ";
    $read = mysqli_query($conn, $sql);
    $delete_link = '

    ';
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
                    <td><a href=\"update.php?id={$row['id']}\" class=\"update\">업데이트</a></td>
                    <td>
                        <form action=\"process_delete.php\" method=\"post\">
                            <input type=\"hidden\" name=\"id\" value=\"{$row['id']}\">
                            <input type=\"submit\" value=\"삭제\" class=\"update delete_btn\">
                        </form>
                    </td>
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

                    <form action="write_action.php" method="post">
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
                        <input type="submit" value="예약" id="submit">
                    </form>
                </table>
            </tr>
        </table>
    </main>

    <script src="write.js"></script>
</body>
</html>