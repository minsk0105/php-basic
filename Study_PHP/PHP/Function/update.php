<h1>Update(수정/갱신)</h1>
<?php
    require_once('lib/print.php'); // print.php 파일을 불러옴
    require('view/top.php');
?>

    <a href="create.php">create</a>

    <?php if (isset($_GET['id'])) { ?>
        <a href="update.php?id=<?= $_GET['id'] ?>">update</a>
        <!-- 위의 표현식은 echo와 같다 -->
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

    <form action="update_process.php" method="post">
        <input type="hidden" name="old_title" value="<?=$_GET['id']?>">
        <p>
            <input type="text" name="Title" placeholder="Title" value="<?php print_title(); ?>">
        </p>
        <p>
            <textarea name="description" placeholder="description"><?php print_description(); ?></textarea>
        </p>
        <p>
            <input type="submit">
        </p>
    </form>
<?php
    require('view/bottom.php');
?>