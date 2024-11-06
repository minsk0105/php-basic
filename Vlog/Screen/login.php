<?php include_once "../Common/header.php" ?>

<head>
    <link rel="stylesheet" href="../CSS/login.css">
</head>
<body>

    <section class="wrap">
        <div class="login_box">
            <h2>로그인</h2>

            <form action="../Process/login_pro.php" method="post">
                <input type="text" name="id" placeholder="아이디" required>
                <input type="password" name="pass" placeholder="비밀번호" required>
                <input type="submit" value="로그인" class="submit_btn">
            </form>

            <p class="sign_up">아직 회원이 아니신가요? <b><a href="register.php">회원가입</a></b></p>
        </div>

        <a href="main.php" class="prev">← 이전으로</a>
    </section>

</body>
</html>