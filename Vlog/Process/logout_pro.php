<?php
    session_start();

    unset($_SESSION['user_id']);
    unset($_SESSION['user_name']);
?>
<script>
    alert ("로그아웃 되었습니다.");
    location.href = "../Screen/main.php";
</script>