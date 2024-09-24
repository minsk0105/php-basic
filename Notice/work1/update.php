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
                    <td><a href=\"update.php?id={$row['id']}\" class=\"update\">업데이트</a></td>
                </tr>
            ";
        }
    } else {
        echo "쿼리 실패 : ". mysqli_error($conn);
    }

    if (isset($_GET['id'])) {
        $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
        $desc_sql = "
            SELECT * FROM board WHERE id = {$filtered_id}
        ";
        $desc_result = mysqli_query($conn, $desc_sql);
        $desc_row = mysqli_fetch_array($desc_result);
        $article = array (
            'name' => htmlspecialchars($desc_row['name']),
            'tel' => htmlspecialchars($desc_row['tel']),
            'born' => htmlspecialchars($desc_row['born']),
            'date' => htmlspecialchars($desc_row['date'])
        );
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
    <form action="process_update.php" method="post">
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
                            <input type="hidden" name="edit" value="<?=$_GET['id']?>">
                            <td><?=$_GET['id']?></td>
                            <td>
                                <input type="text" name="name" id="name" value="<?=$article['name']?>">
                            </td>
                            <td>
                                <input type="text" name="tel" id="tel" value="<?=$article['tel']?>">
                            </td>
                            <td>
                                <input type="text" name="born" id="born" value="<?=$article['born']?>">
                            </td>
                            <td><?=$article['date']?></td>
                            <td><a href="write.php" style="cursor: pointer;">뒤로가기</a></td>
                        </tr>
                    </table>
                    <input type="submit" value="수정" id="submit">
                </tr>
            </table>
        </main>
    </form>

    <script src="write.js"></script>
</body>
</html>