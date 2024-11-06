<?php require_once("../Common/top.php") ?>
<head>
    <link rel="stylesheet" href="../CSS/login.css">
</head>
<body>

    <div id="wrap">
        <div class="login_box">
            <h2>회원가입</h2>

            <form action="../Process/sign_pro.php" method="post">
                <input type="text" name="id" placeholder="아이디" maxlength="20">
                <input type="password" name="pass" placeholder="비밀번호" maxlength="20">
                <input type="password" name="pass_check" placeholder="비밀번호 확인" maxlength="20">
                <input type="text" name="name" placeholder="이름" maxlength="20">
                <div class="gender_box">
                    <label><input type="radio" name="gender" id="man" autocomplete="off" value="남자" checked><span>남자</span></label>
                    <label><input type="radio" name="gender" id="woman" autocomplete="off" value="여자"><span>여자</span></label>
                </div>
                <input type="text" name="phone" placeholder="전화번호" maxlength="20">
                <input type="text" name="email" placeholder="이메일" maxlength="80">
                <input type="submit" value="회원가입" class="submit_btn">
                <span class="reset">초기화</span>
            </form>
        </div>
        <a href="main.php">← 이전으로</a>
    </div>

    <script src="../Js/login.js"></script>

</body>
</html>