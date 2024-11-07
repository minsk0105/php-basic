<?php
    include_once "../DB/config.php";
    include_once "../DB/db_conn.php";
    include_once "../Common/header.php";

    $idx = $_GET['idx'];
    $sql = sql_query("SELECT * FROM board WHERE idx = $idx");
    $row = mysqli_fetch_array($sql);
    mysqli_close($conn);
?>

<head>
    <link rel="stylesheet" href="../CSS/write.css">
</head>
<body>

    <section class="write_area">
        <div class="title"><h1>게시판 수정하기</h1></div>

        <div class="write_box">

            <!-- action에서 idx값으로 경로를 추가한 이유는 /로 인해 더 직관적으로 볼 수 있기 때문 -->
            <form action="../Process/update_pro.php/<?= $row['idx'] ?>" method="post" id="update_form">
            
                <input type="hidden" name="idx" value="<?= $idx ?>">
                <table class="table">
                    <tbody>
                        <tr>
                            <td><span>아이디 : <b><?= $user_id ?></b></span></td>
                        </tr>

                        <tr>
                            <td><input type="text" name="title" placeholder="글 제목" value="<?= $row['title'] ?>" required></td>
                        </tr>

                        <tr>
                            <td><input type="password" name="write_pass" placeholder="글 비밀번호"></td>
                        </tr>

                        <tr>
                            <td><textarea name="content" placeholder="글 내용" required><?= $row['content'] ?></textarea></td>
                        </tr>
                    </tbody>
                </table>

                <div class="check">
                    <input type="checkbox" value="1" name="lock_post"><span>비공개</span>
                </div>

                <button type="submit" class="btn push">수정하기</button>

            </form>
        </div>
    </section>
    <a href="list.php" class="prev">← 이전으로</a>

    <script>
        const form = document.getElementById('update_form');
        const submitBtn = document.querySelector('.push');

        submitBtn.addEventListener('click', function(event) {
            if (form.write_pass.value === "") {
                
                if (!confirm ("비밀번호를 기존의 번호로 저장하시겠습니까?")) {

                    alert ("새 비밀번호를 입력해 주세요.");
                    form.write_pass.focus();
                    event.preventDefault();
                    return false;
                }
            }
        });
    </script>

</body>
</html>