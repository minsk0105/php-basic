<?php
    include_once "../DB/config.php";
    include_once "../DB/db_conn.php";
    include_once "../Common/header.php";
    include_once "../Process/login_check.php";
?>

<head>
    <link rel="stylesheet" href="../CSS/write.css">
</head>
<body>

    <section class="write_area">
        <div class="title"><h1>게시판 글쓰기</h1></div>

        <div class="write_box">
            <form action="../Process/write_pro.php" method="post">
            
                <table class="table">
                    <tbody>
                        <tr>
                            <td><span>아이디 : <b><?= $user_id ?></b></span></td>
                        </tr>

                        <tr>
                            <td><input type="text" name="title" placeholder="글 제목" required></td>
                        </tr>

                        <tr>
                            <td><input type="password" name="write_pass" placeholder="글 비밀번호"></td>
                        </tr>

                        <tr>
                            <td><textarea name="content" placeholder="글 내용" required></textarea></td>
                        </tr>
                    </tbody>
                </table>

                <div class="check">
                    <input type="checkbox" value="1" name="lock_post"><span>비공개</span>
                </div>

                <button type="submit" class="btn push">글쓰기</button>

            </form>
        </div>
    </section>
    <a href="list.php" class="prev">← 이전으로</a>

</body>
</html>