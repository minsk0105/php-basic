<?php
    include_once "../DB/config.php";
    include_once "../DB/db_conn.php";
    include_once "../Common/header.php";

    // 현재 페이지 번호를 확인
    if (isset($_GET['page'])) {
        $page = $_GET['page']; // 1, 2, 3, 4, 5
    } else {
        $page = 1;
    }

    $category = $_GET['category'];
    $search = $_GET['search'];
?>
<head>
    <link rel="stylesheet" href="../CSS/list.css">
</head>
<body>

    <main>
        <header class="header">
            <h1>PHP_블로그 게시판</h1>

            <div class="btn_menu">
                <?php if (!$user_id == "") { ?>
                    <a href="../Process/logout_pro.php">
                        <button class="btn">로그아웃</button>
                    </a>
                <?php } else { ?>
                    <a href="login.php">
                        <button class="btn">로그인</button>
                    </a>
                <?php } ?>
            </div>
        </header>

        <section class="board_area">
            <h1>자유게시판</h1>
            <h4>자유롭게 글을 쓸 수 있는 게시판입니다.</h4>

            <?php
                if ($category == 'title') {
                    $keyword = '제목';
                } else if ($category == 'name') {
                    $keyword = '글쓴이';
                } else {
                    $keyword = '내용';
                }
            ?>
            <h1><?= $keyword ?> 에서 <b><?= $search ?></b> 검색결과</h1>

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
                    $paging_sql = sql_query("SELECT * FROM board WHERE $category LIKE '%{$search}%' ORDER BY idx DESC");
                    $total_record = mysqli_num_rows($paging_sql); // 검색된 전체 레코드 개수

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

                    // 검색된 게시글 정보 가져오기
                    $getList_sql = sql_query("SELECT * FROM board WHERE $category LIKE '%{$search}%' ORDER BY idx DESC LIMIT $page_start, $block_list");
                    $search_num = mysqli_num_rows($getList_sql);
                ?>

                <?php
                    if (!$search_num == 0) {
                        while ($board = mysqli_fetch_array($getList_sql)) {
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
                            );
    
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?= $list['idx'] ?></td>
                                        <td>
                                            <?php
                                                $lock_img = "<img src='../Img/lock_key.png' class='lock'></img>";
    
                                                if ($board['lock_post'] == "1") { // lock_post값이 1이면 잠금 ?>
                                                    <span class="lock_check" style="cursor: pointer;" data-idx="<?= $list['idx'] ?>"><?= $title ?><?= $lock_img ?></span>
                                                <?php } else { ?>
                                                    <span class="read_check" data-action="read.php?idx=<?= $list['idx'] ?>">
                                                        <?= $list['title'] ?>
                                                    </span>
                                                <?php }
                                            ?>
                                        </td>
                                        <td><?= $list['name'] ?></td>
                                        <td><?= $list['date'] ?></td>
                                        <td><?= $list['hit'] ?></td>
                                    </tr>
                                </tbody>
                        <?php }
                    } else { ?>
                        <tbody>
                            <tr>
                                <td colspan="5">검색하신 결과가 없습니다.</td>
                            </tr>
                        </tbody>
                    <?php }
                ?>
            </table>

            <!-- 비공개 글 모달창 -->
            <div class="modal">
                <div class="modal_box">
                    <h2>이 글은 비공개입니다.</h2>

                    <form action="../Process/pass_check.php?idx=" method="post" id="modal_form">
                        <p>
                            <b><span>비밀번호</span></b>
                            <input type="password" name="pass_check" required>
                            <input type="submit" value="확인">
                        </p>
                    </form>

                    <span class="close">닫기</span>
                </div>
            </div>

            <!-- 페이징 -->
            <div class="page_num">
                <?php
                    if ($page <= 1) {
                        // empty
                    } else {
                        echo "<a href='list_result.php?category=$category&search=$search&page=1'> 처음으로 </a>";
                        $prev = $page - 1;
                        echo "<a href='list_result.php?category=$category&search=$search&page=$prev'> ◀ </a>";
                    }

                    for ($i = $block_start; $i <= $block_end; $i++) {
                        if ($page == $i) {
                            echo "<b style='color: #12B886;'> $i </b>";
                        } else {
                            echo "<a href='list_result.php?category=$category&search=$search&page=$i'> $i </a>";
                        }
                    }

                    if ($page >= $total_page) {
                        // empty
                    } else {
                        $next = $page + 1;
                        echo "<a href='list_result.php?category=$category&search=$search&page=$next'> ▶ </a>";
                        echo "<a href='list_result.php?category=$category&search=$search&page=$total_page'> 마지막 </a>";
                    }
                ?>
            </div>

            <!-- 글쓰기 버튼 -->
            <div class="write_btn">
                <a href="write.php">
                    <button class="btn">글쓰기</button>
                </a>
            </div>

            <!-- 검색 영역 -->
            <div class="search_box">
                <form action="list_result.php" method="get">

                    <select name="category">
                        <option value="title">제목</option>
                        <option value="name">글쓴이</option>
                        <option value="content">내용</option>
                    </select>

                    <input type="text" name="search" size="40" required>
                    
                    <button class="search_btn">검색</button>

                </form>
            </div>
        </section>
    </main>

    <script src="../Js/list.js"></script>

</body>
</html>