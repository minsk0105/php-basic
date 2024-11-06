<?php
    include_once "../DB/db_conn.php";

    $bno = $_GET['idx'];
    $bno_sql = "SELECT * FROM board WHERE idx='".$bno."'";
    $bno_query = mysqli_query($conn, $bno_sql);
    $bno_row = mysqli_fetch_array($bno_query);
?>
<?php
    $bpw = $bno_row['pass'];
    if (isset($_POST['pw_check'])) {
        $pwk = $_POST['pw_check'];
        if (password_verify($pwk, $bpw)) {
            $pwk == $bpw;
        ?>
            <script>
                location.replace("../Screen/read.php?idx=<?= $bno_row['idx'] ?>");
            </script>
        <?php } else { ?>
            <script>
                alert ("비밀번호가 일치하지 않습니다.");
                history.back();
            </script>
        <?php }
    }
?>