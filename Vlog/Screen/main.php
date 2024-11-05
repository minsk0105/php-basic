<?php
    require_once ("../DB/config.php");
    require_once ("../Common/top.php");
?>
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

    <section id="intro">
        <h1>웹사이트 소개</h1>
        <p>이 웹 사이트는 '서버프로그래밍' 수업의 기말 프로젝트를 위해서 PHP를 이용해 간단하게 구현한 게시판입니다.</p>
        <a href="">
            <button type="button">게시판 바로가기</button>
        </a>
    </section>

</body>
</html>