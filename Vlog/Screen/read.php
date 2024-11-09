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
    
    mysqli_close($conn);
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
                    </a>
                <?php } ?>
            </div>

            <div class="reply_container">
                
                <!-- 댓글 작성 폼 -->
                <div class="dat_write">
                    <h2 class="reply_title">댓글</h2>
                    <input type="hidden" name="thisIdx" value="<?= $idx ?>">
                    <input type="hidden" name="datUser" value="<?= $user_id ?>">

                    <div class="dat_box">
                        <textarea name="content" class="dat_con"></textarea>
                        <button class="btn">댓글 작성</button>
                    </div>
                </div>

                <!-- 댓글 목록 -->
                <div class="reply_view">

                    <div class="dat_view">
                        <div class="dat_name"><b>admin</b> <span>| 2024-11-09</span></div>
                        <div class="dat_btn_menu">
                            <a href="">삭제</a>
                        </div>
                        <div class="dat_content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi cupiditate labore sunt atque dignissimos ea voluptatum illum, harum eos exercitationem quia pariatur. Repudiandae illo eius minima hic. Itaque, atque deleniti!</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <a href="list.php" class="prev">← 이전으로</a>

    <script>
        const deleteBtn = document.querySelector('.delete_btn');

        deleteBtn.addEventListener('click', function(event) {
            if (!confirm ("게시글을 삭제하시겠습니까?")) {
                event.preventDefault();
                return false;
            }
        });
    </script>

</body>
</html>