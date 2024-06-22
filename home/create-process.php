<?php $conn = mysqli_connect('localhost','root','','basic') ?>
<?php
    $sql = "INSERT INTO notice(name, title) VALUE('{$_POST['name']}', '{$_POST['title']}')";
    mysqli_query($conn, $sql);
?>

<script>
    alert('유저가 생성되었습니다.');
    location.href = 'main.php';
</script>