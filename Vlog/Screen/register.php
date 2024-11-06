<?php include_once "../Common/header.php" ?>

<head>
    <link rel="stylesheet" href="../CSS/login.css">
</head>
<style>
    .gender_box,
    label {
        display: flex;
        align-items: center;
    }

    label,
    label span {
        width: 60px;
        cursor: pointer;
    }

    .reset {
        margin-top: 20px;
        text-align: right;
    }

    .reset span {
        font-size: 14px;
        cursor: pointer;
    }

    .reset span:hover {
        font-weight: bold;
    }
</style>
<body>

    <section class="wrap">
        <div class="login_box">
            <h2>회원가입</h2>

            <form action="../Process/register_pro.php" method="post">
                <input type="text" name="id" placeholder="아이디" maxlength="20" required>

                <input type="password" name="pass" placeholder="비밀번호" maxlength="20" required>
                <input type="password" name="pass_check" placeholder="비밀번호 확인" maxlength="20" required>

                <input type="text" name="name" placeholder="이름" maxlength="20" required>

                <div class="gender_box">
                    <label><input type="radio" name="gender" id="man" autocomplete="off" value="남자" checked><span>남자</span></label>
                    <label><input type="radio" name="gender" id="woman" autocomplete="off" value="여자"><span>여자</span></label>
                </div>

                <input type="text" name="phone" placeholder="전화번호" maxlength="20" required>
                <input type="text" name="email" placeholder="이메일" maxlength="80" required>

                <input type="submit" value="회원가입" class="submit_btn">

                <div class="reset">
                    <span>초기화</span>
                </div>
            </form>
        </div>

        <a href="main.php" class="prev">← 이전으로</a>
    </section>

    <script src="../Js/register.js"></script>

</body>
</html>