<?php
    require_once ("../DB/config.php");
    require_once ("../Common/top.php");
    include_once "../DB/db_conn.php";

    if (isset($_GET['page'])) {
        $page = $_GET['page']; // 1, 2, 3, 4, 5
    } else {
        $page = 1;
    }
?>

<?php
    $sql = "SELECT * FROM board ORDER BY idx DESC";
    $query = mysqli_query($conn, $sql);
?>

<head>
    <link rel="stylesheet" href="../CSS/list.css">
</head>
<body>

    <header id="header">
        <h1 class="logo">PHP_Vlog</h1>
        <div class="btn_menu">
            <?php if ($user_id) { ?>
                <a href="../Process/logout_pro.php">
                    <button class="login_btn">로그아웃</button>
                </a>
            <?php } else { ?>
                <a href="login.php">
                    <button class="login_btn">로그인</button>
                </a>
            <?php } ?>
            <a href="register.php">
                <button class="sign_btn">회원가입</button>
            </a>
        </div>
    </header>

    <section class="board_area">
        <h1>자유게시판</h1>
        <h4>자유롭게 글을 쓸 수 있는 게시판입니다.</h4>

        <div id="search_box">
            <form action="" method="get">

                <select name="category">
                    <option value="title">제목</option>
                    <option value="name">글쓴이</option>
                    <option value="content">내용</option>
                </select>
                <input type="text" name="search" size="40" required="required">
                <button class="btn search_btn">검색</button>

            </form>
        </div>

        <table class="table">

            <thead>
                <tr>
                    <th>번호</th>
                    <th>제목</th>
                    <th>작성자</th>
                    <th>작성일</th>
                    <th>조회수</th>
                </tr>
            </thead>

            <?php
                $paging_sql = "SELECT * FROM board";
                $paging_query = mysqli_query($conn, $paging_sql);
                $total_record = mysqli_num_rows($paging_query); // 전체 레코드 개수

                $block_list = 5;
                $block_cnt = 5;
                $block_num = ceil($page / $block_cnt); // 1
                $block_start = (($block_num - 1) * $block_cnt) + 1;
                $block_end = $block_start + $block_cnt - 1;
                
                $total_page = ceil($total_record / $block_list);
                if ($block_end > $total_page) {
                    $block_end = $total_page;
                }

                $total_block = ceil($total_page / $block_cnt); // 블록의 총 개수
                $page_start = ($page - 1) * $block_list; // SQL문 LIMIT 조건 사용

                // 게시글 정보 가져오기
                $getList_sql = "SELECT * FROM board ORDER BY idx DESC LIMIT $page_start, $block_list";
                $getList_query = mysqli_query($conn, $getList_sql);
            ?>

            <?php
                while ($board = mysqli_fetch_array($getList_query)) {
                    $title = $board['title'];

                    if (strlen($title) > 30) {
                        $title = str_replace($board['title'], mb_substr($board['title'], 0, 30, "utf-8") . "...", $board['title']);
                    }
                
                    $list = array (
                        "idx" => $board['idx'],
                        "title" => $title,
                        "name" => $board['name'],
                        "date" => $board['date'],
                        "hit" => $board['hit']
                    ); ?>
                    <tbody>
                        <tr>
                            <td><?= $list['idx'] ?></td>
                            <td>
                                <span class="read_check" data_action="read.php?idx=<?= $list['idx'] ?>">
                                    <?= $list['title'] ?>
                                </span>
                            </td>
                            <td><?= $list['name'] ?></td>
                            <td><?= $list['date'] ?></td>
                            <td><?= $list['hit'] ?></td>
                        </tr>
                    </tbody>
            <?php } ?>

        </table>

        <div id="page_num">
            <?php
                if ($page <= 1) {
                    // empty
                } else {
                    echo "<a href='list.php?page=1'> 처음으로 </a>";
                    $prev = $page - 1;
                    echo "<a href='list.php?page=$prev'> ◀ </a>";
                }

                for ($i = $block_start; $i <= $block_end; $i++) {
                    if ($page == $i) {
                        echo "<b style='color: #12B886;'> $i </b>";
                    } else {
                        echo "<a href='list.php?page=$i'> $i </a>";
                    }
                }

                if ($page >= $total_page) {
                    // empty
                } else {
                    $next = $page + 1;
                    echo "<a href='list.php?page=$next'> ▶ </a>";
                    echo "<a href='list.php?page=$total_page'> 마지막 </a>";
                }
            ?>
        </div>

        <div class="write_btn">
            <a href="write.php">
                <button class="btn">글쓰기</button>
            </a>
        </div>

    </section>

    <script>
        const titleBtn = document.querySelectorAll('.read_check');

        titleBtn.forEach(function(btn) {
            btn.addEventListener('click', function() {
                var action_url = this.getAttribute("data_action");
                location.href = action_url;
            });
        });
    </script>

</body>
</html>