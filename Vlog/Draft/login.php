<?php require_once("../Common/top.php") ?>
<head>
    <link rel="stylesheet" href="../CSS/login.css">
</head>
<body>

    <div id="wrap">
        <div class="login_box">
            <h2>로그인</h2>

            <form action="../Process/login_pro.php" method="post">
                <input type="text" name="id" placeholder="아이디">
                <input type="password" name="pass" placeholder="비밀번호">
                <input type="submit" value="로그인" class="submit_btn">
            </form>
            <span class="non_members">아직 회원이 아니신가요?</span>
        </div>
        <a href="main.php">← 이전으로</a>
    </div>

    <script src="../Js/login.js"></script>

</body>
</html>