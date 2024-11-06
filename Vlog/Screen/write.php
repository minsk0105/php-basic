<?php
    require_once ("../DB/config.php");
    require_once ("../Common/top.php");
    include_once "../DB/db_conn.php";
    include_once "../Process/login_check.php";
?>
<head>
    <link rel="stylesheet" href="../CSS/write.css">
</head>

<body>

    <section class="write_area">
        <div class="title">게시판 글쓰기</div>

        <form action="../Process/write_pro.php" method="post">
            <table class="table">
                <tbody>
                    <tr>
                        <td><span>아이디 : <b><?= $user_id ?></b></span></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form_control" placeholder="글 제목" name="title" id="utitle" required></td>
                    </tr>
                    <tr>
                        <td><input type="password" class="form_control" placeholder="글 비밀번호" name="pw" id="upw"></td>
                    </tr>
                    <tr>
                        <td><textarea class="form_control" placeholder="글 내용" name="content" id="ucontent" required></textarea></td>
                    </tr>
                </tbody>
            </table>
            <div class="check">
            <input type="checkbox" value="1" name="lock_post">비밀글
            </div>
            <br><br>
            <button type="submit" class="btn">글쓰기</button>
        </form>
        <a href="main.php" style="display: block; margin-top: 10px; text-decoration: none; cursor: pointer;">홈으로</a>
    </section>

</body>
</html>