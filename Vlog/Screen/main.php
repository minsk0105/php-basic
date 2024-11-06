<?php
    include_once "../DB/config.php";
    include_once "../Common/header.php";
?>

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
        
        <section class="intro">
            <h2>웹사이트 소개</h2>
            <h4>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Itaque, maiores. Dolore molestias doloribus omnis natus itaque numquam esse, aspernatur nostrum explicabo quod tenetur similique cum, assumenda dicta! Enim, at sequi.</h4>
            <a href="list.php">
                <button class="move">게시판 바로가기</button>
            </a>
        </section>
    </main>

</body>
</html>