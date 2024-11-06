<?php
    require_once ("../DB/config.php");
    require_once ("../Common/top.php");
    include_once "../DB/db_conn.php";
    include_once "../Process/login_check.php";
?>
<?php
    $idx = $_GET['idx'];

    $sql = "SELECT * FROM board WHERE idx = '".$idx."'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    // 조회수 올리기
    $hit = $row['hit'] + 1;
    $update_hit = "UPDATE
            board
        SET
            hit = '".$hit."'
        WHERE
            idx = '".$idx."'
    ";
    $update_query = mysqli_query($conn, $update_hit);
?>
<head>
    <link rel="stylesheet" href="../CSS/read.css">
</head>

<body>

    <section class="write_area">
        <div class="title">게시판 읽기</div>

        <form action="../Process/write_pro.php" method="post">

            <table class="table">
                <tbody>
                    <tr>
                        <td>글 제목</td>
                        <td><?= $row['title'] ?></td>
                    </tr>
                    <tr>
                        <td>작성자</td>
                        <td><?= $row['name'] ?></td>
                    </tr>
                    <tr>
                        <td>작성일자</td>
                        <td><?= $row['date'] ?></td>
                    </tr>
                    <tr>
                        <td>내용</td>
                        <td><?= $row['content'] ?></td>
                    </tr>
                </tbody>
            </table>

        </form>
        <a href="list.php" class="btn">목록</a>
        <?php if ($user_id == $row['name']) { ?>
            <a href="update.php?idx=<?= $row['idx'] ?>" class="btn">수정</a>
            <a href="delete.php?idx=<?= $row['idx'] ?>" class="btn">삭제</a>
        <?php } ?>
        <a href="main.php" style="display: block; margin-top: 10px; text-decoration: none; cursor: pointer;">홈으로</a>
    </section>

</body>
</html>