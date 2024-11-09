<?php
    include_once "../DB/config.php";
    include_once "../DB/db_conn.php";
    include_once "../Process/login_check.php";
    include_once "../Common/header.php";

    $idx = $_GET['idx'];

    $sql = sql_query("SELECT * FROM board WHERE idx = '$idx'");
    $row = mysqli_fetch_array($sql);

    // 조회수 올리기
    $hit = $row['hit'] + 1;
    $update_hit = sql_query("UPDATE
            board
        SET
            hit = '$hit'
        WHERE
            idx = '$idx'
    ");
?>

<head>
    <link rel="stylesheet" href="../CSS/write.css">
    <link rel="stylesheet" href="../CSS/reply.css">
</head>
<style>
    .write_box {
        position: relative;
    }

    .read_header {
        display: flex;
        align-items: center;
        border-bottom: 1px solid rgb(195, 195, 195);
        padding-bottom: 10px;
        margin-bottom: 10px;
    }

    .read_title {
        display: inline-block;
        margin-right: 15px;
    }

    .read_lock {
        font-size: 12px;
        padding: 3px 10px;
        border: 1px solid gray;
        border-radius: 30px;
        color: gray;
    }

    .read_name {
        margin-top: 30px;
        font-size: 16px;
        font-weight: bold;
    }

    .description {
        margin-top: 10px;
        width: 100%;
        min-height: 500px;
        padding: 20px;
        border: 1px solid rgb(195, 195, 195);
    }

    .read_date {
        margin-top: 20px;
        display: block;
        text-align: right;
        font-size: 14px;
        font-weight: bold;;
        color: gray;
    }

    .readed {
        position: absolute;
        top: 20px;
        right: 20px;
    }

    .edit_btn {
        display: flex;
        align-items: center;
    }
    
    .btn {
        margin-right: 15px;
    }
</style>
<body>

    <section class="write_area">
        <div class="title"><h1>게시판 읽기</h1></div>

        <div class="write_box">
            <div class="read_header">
                <h1 class="read_title"><?= $row['title'] ?></h1>
                <?php if ($row['lock_post'] === '1') { ?>
                    <span class="read_lock">비공개</span>
                <?php } else { ?>
                    <span class="read_lock">공개</span>
                <?php } ?>
            </div>
            <p class="read_name">by. <?= $row['name'] ?></p>
            <p class="description">
                <?= $row['content'] ?>
            </p>
            <p class="read_date">마지막 업데이트 : <?= $row['date'] ?></p>
            <span class="readed">조회 <?= $row['hit'] ?></span>

            <div class="edit_btn">
                <a href="list.php">
                    <button type="button" class="btn">목록</button>
                </a>
                <?php if ($user_id == $row['name']) { ?>
                    <a href="update.php?idx=<?= $row['idx'] ?>">
                        <button type="button" class="btn">수정</button>
                    </a>
                    <a href="../Process/delete_pro.php?idx=<?= $row['idx'] ?>">
                        <button type="button" class="btn delete_btn">삭제</button>
                        <script>
                            const deleteBtn = document.querySelector('.delete_btn');
                                            
                            deleteBtn.addEventListener('click', function(event) {
                                if (!confirm ("게시글을 삭제하시겠습니까?")) {
                                    event.preventDefault();
                                    return false;
                                }
                            });
                        </script>
                    </a>
                <?php } ?>
            </div>

            <div class="reply_container">
                
                <!-- 댓글 작성 폼 -->
                <div class="dat_write">
                    <h2 class="reply_title">댓글</h2>
                    <form action="../Process/reply_pro.php" method="post">
                        <input type="hidden" name="thisIdx" class="thisIdx" value="<?= $idx ?>">
                        <input type="hidden" name="datUser" class="datUser" value="<?= $user_id ?>">

                        <div class="dat_box">
                            <textarea name="content" class="dat_con"></textarea>
                            <button type="submit" class="btn reply_btn">댓글 작성</button>
                        </div>
                    </form>
                </div>

                <!-- 댓글 목록 -->
                <?php
                    $road_reply = sql_query("SELECT * FROM comment WHERE con_num = '$idx' ORDER BY idx DESC");
                    mysqli_close($conn);
                    while ($dat_row = mysqli_fetch_array($road_reply)) {
                            $ymd = substr($dat_row['date'], 0, 10);
                        ?>
                        <div class="reply_view">
                            <div class="dat_view">
                                <div class="dat_name"><b><?= $dat_row['name'] ?></b> <span>| <?= $ymd ?></span></div>

                                <form action="../Process/delete_reply.php" method="post" class="dat_btn_menu">
                                    <input type="hidden" name="idx" value="<?= $dat_row['idx'] ?>">

                                    <?php if ($user_id === $dat_row['name']) { ?>
                                        <button type="submit" class="del_reply">삭제</button>
                                    <?php } else {
                                        // empty
                                    } ?>
                                </form>

                                <div class="dat_content"><?= $dat_row['content'] ?></div>
                            </div>
                        </div>
                    <?php }
                ?>
            </div>
        </div>
    </section>
    <a href="list.php" class="prev">← 이전으로</a>

    <script>
        document.querySelectorAll('.del_reply').forEach(function(btn) {
            btn.addEventListener('click', function(event) {

                if (!confirm ("댓글을 삭제하시겠습니까?")) {
                    event.preventDefault();
                    return false;
                }
                
            });
        });
    </script>
</body>
</html>