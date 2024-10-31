<?php
    include_once "../DB/db_conn.php";

    $sql = "SELECT * FROM notice_board ORDER BY idx DESC";
    $query = mysqli_query($conn, $sql);

    // 현재 페이지 번호를 확인하기 위한 변수
    if (isset($_GET['page'])) {
        $page = $_GET['page']; // 1, 2, 3, 4, 5
    } else {
        $page = 1;
    }
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 보드(페이징)</title>
    <link rel="stylesheet" href="../Css/style.css">
</head>
<body>
    
    <div class="container">

        <div id="board_area">
            <h1><b>게시판 블로그</b></h1>
            <h4>자유롭게 글을 쓸 수 있는 게시판입니다.</h4>

            <table class="table table_striped">

                <thead>
                    <tr>
                        <th>번호</th>
                        <th>제목</th>
                        <th>작성자</th>
                        <th>작성일</th>
                        <th>조회수</th>
                    </tr>
                </thead>

                <!-- 페이징 기능 -->
                <?php
                    $page_sql = "SELECT * FROM notice_board";
                    $page_query = mysqli_query($conn, $page_sql);
                    $total_record = mysqli_num_rows($page_query); // 테이블에 있는 모든 레코드 수

                    $list = 5; // 한 페이지 보여줄 개수
                    $block_cnt = 5; // 페이지당 보여지는 블록 개수
                    $block_num = ceil($page / $block_cnt); // ceil() = 인자 값을 무조건 올림 처리 / 현재 페이지를 $block_cnt로 나눔으로써 현재 페이지 블록을 저장
                    $block_start = (($block_num - 1) * $block_cnt) + 1; // 블록의 시작 번호 ex) 1, 6, 11
                    $block_end = $block_start + $block_cnt - 1; // 블록의 마지막 번호 ex) 5, 10, 15

                    $total_page = ceil($total_record / $list); // 페이징한 페이지 수
                    if ($block_end > $total_page) {
                        $block_end = $total_page;
                    }

                    $total_block = ceil($total_page + $block_cnt);
                    $page_start = ($page - 1) * $list;

                    // 게시글 정보 가져오기
                    $getBoard_sql = "SELECT * FROM notice_board
                        ORDER BY idx DESC LIMIT $page_start, $list
                    "; // LIMIT n+1번째부터, n개를 검색한다
                    $getBoard_query = mysqli_query($conn, $getBoard_sql);
                ?>

                <?php
                    while ($board = mysqli_fetch_array($getBoard_query)) {
                        $title = $board['title'];
                    
                        // 글자 수가 30이 넘으면 ... 처리
                        if (strlen($title) > 30) {
                            $title = str_replace($board['title'], mb_substr($board['title'], 0, 30, "utf-8") . "...", $board['title']);
                        } ?>

                        <tbody>
                            <tr>
                                <td><?=$board['idx']?></td>
                                <td>
                                    <span class="read_check" data-action="read.php?idx=<?=$board['idx']?>"><?=$title?></span>
                                </td>
                                <td><?=$board['name']?></td>
                                <td><?=$board['date']?></td>
                                <td><?=$board['hit']?></td>
                            </tr>
                        </tbody>
                            
                <?php } ?>

            </table>

            <div id="page_num">
                    <?php
                        if ($page <= 1) {
                            // 빈 값
                        } else {
                            echo "<a href='index.php?page=1'> 처음 </a>";
                        }
                    
                        if ($page <= 1) {
                            // empty value
                        } else {
                            $prev = $page - 1;
                            echo "<a href='index.php?page=$prev'>◀</a>";
                        }
                    
                        for ($i = $block_start; $i <= $block_end; $i++) {
                            
                            if ($page == $i) {
                                echo "<b> $i </b>";
                            } else {
                                echo "<a href='index.php?page=$i'> $i </a>";
                            }
                        
                        }
                    
                        if ($page >= $total_page) {
                            // empty value
                        } else {
                            $next = $page + 1;
                            echo "<a href='index.php?page=$next'>▶</a>";
                        }
                    
                        if ($page >= $total_page) {
                            // empty value
                        } else {
                            echo "<a href='index.php?page=$total_page'> 마지막 </a>";
                        }
                    ?>
            </div>

            <div id="write_btn">
                <a href="write.php">
                    <button class="btn btn_primary pull_right">글쓰기</button>
                </a>
            </div>

            <div id="search_box">

                <form action="search_result.php" method="get">
                    <select name="category">
                        <option value="title">제목</option>
                        <option value="name">글쓴이</option>
                        <option value="content">내용</option>
                    </select>

                    <input type="text" name="search" size="40" required="required">

                    <button class="btn btn_primary">검색</button>
                </form>

            </div>
        </div>

    </div>

    <script src="../Js/app.js"></script>

</body>
</html>