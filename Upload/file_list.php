<?php
    $conn = mysqli_connect('localhost', 'root', '', 'upload');

    $query = "SELECT file_id, name_orig, name_save FROM upload_file
        ORDER BY reg_time DESC;
    ";

    $road_stmt = mysqli_prepare($conn, $query); // 실행할 쿼리 준비
    $execute = mysqli_stmt_execute($road_stmt); // 쿼리 실행
    $result = mysqli_stmt_get_result($road_stmt); // 실행한 쿼리의 값을 읽어옴

    $list = '';
    while($row = mysqli_fetch_assoc($result)) {
        $list .= "
            <tr>
                <td>{$row['file_id']}</td>
                <td>
                    <a href=\"download.php?file_id={$row['file_id']}\" target=\"_blank\">
                        {$row['name_orig']}
                    </a>
                </td>
                <td>{$row['name_save']}</td>
            </tr>
        ";
    }

    mysqli_free_result($result);
    mysqli_stmt_close($road_stmt);
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>파일 목록 조회</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            cursor: default;
        }

        table {
            border-collapse: collapse;
        }
        
        th {
            border: 1px solid rgb(30, 30, 30);
            padding: 10px 15px;
            background-color: aliceblue;
        }

        td {
            border: 1px solid rgb(30, 30, 30);
            padding: 10px 15px;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <table>

        <tr>
            <th>파일 아이디</th>
            <th>기존 파일명</th>
            <th>저장된 파일명</th>
        </tr>

        <?=$list?>

        <tr>
            <td colspan="3">
                <a href="file.php">홈으로</a>
            </td>
        </tr>
    </table>
</body>
</html>