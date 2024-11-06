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
    </main>

</body>
</html>