<?php
    require_once('lib/print.php'); // print.php 파일을 불러옴
    require('view/top.php');
    // require_once는 중복된 require가 있을 때 이를 무시하고 실행한다.
?>

    <a href="create.php">create</a>

    <?php if (isset($_GET['id'])) { ?>
        <a href="update.php?id=<?= $_GET['id'] ?>">update</a>
        <!-- <a href="delete_process.php?id=<?= $_GET['id'] ?>">delete</a>  GET 방식 -->
        <!-- 위의 표현식은 echo와 같다 -->
        <form action="delete_process.php" method="post">
            <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
            <input type="submit" value="delete">
        </form>
    <?php } ?>

    <h2>
        <?php
            print_title();
        ?>
    </h2>

    <p>
        <?php
            print_description();
        ?>
    </p>
<?php
    require('view/bottom.php');
?>