<?php
    require_once ("../DB/config.php");
    require_once ("../Common/top.php");
    include_once "../DB/db_conn.php";
    include_once "../Process/login_check.php";

    $idx = $_GET['idx'];

    $sql = "SELECT * FROM board WHERE idx = '".$idx."'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
?>

<head>
    <link rel="stylesheet" href="../CSS/write.css">
</head>

<body>

    <section class="write_area">
        <div class="title">게시판 수정하기</div>

        <form action="../Process/update_pro.php/<?= $row['idx'] ?>" method="post">
            <input type="hidden" name="idx" value="<?= $idx ?>">
            <table class="table">
                <tbody>
                    <tr>
                        <td><span>아이디 : <b><?= $user_id ?></b></span></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form_control" placeholder="글 제목" name="title" id="utitle" value="<?= $row['title'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><input type="password" class="form_control" placeholder="글 비밀번호" name="pw" id="upw"></td>
                    </tr>
                    <tr>
                        <td><textarea class="form_control" placeholder="글 내용" name="content" id="ucontent" required><?= $row['content'] ?></textarea></td>
                    </tr>
                </tbody>
            </table>
            <br><br>
            <button type="submit" class="btn">수정하기</button>
        </form>
        <a href="main.php" style="display: block; margin-top: 10px; text-decoration: none; cursor: pointer;">홈으로</a>
    </section>

</body>
</html>