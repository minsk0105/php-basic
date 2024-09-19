<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 실습 1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="write_action.php" method="post">

        <table>
            <tr>
                <td class="table-header">
                    <p>게시글 작성하기</p>
                </td>
            </tr>

            <tr>
                <td>
                    <table class="input-table">
                        <tr>
                            <td class="title">작성자</td>
                            <td><input type="text" name="name" size="30"></td>
                        </tr>

                        <tr>
                            <td class="title">제목</td>
                            <td><input type="text" name="title" size="70"></td>
                        </tr>

                        <tr>
                            <td class="title">내용</td>
                            <td><textarea name="content" cols=75 rows=15></textarea></td>
                        </tr>

                        <tr>
                            <td class="title">비밀번호</td>
                            <td><input type="password" name="pw" size="15" maxlength=15></td>
                        </tr>
                    </table>

                    <center>
                        <input type="submit" value="작성">
                    </center>
                </td>
            </tr>
        </table>

    </form>
</body>
</html>