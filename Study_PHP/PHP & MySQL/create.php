<?php
    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'opentutorials'
    );
    $sql = "
    SELECT * FROM topic
    ";
    $result = mysqli_query($conn, $sql);
    $list = ''; // $list라는 임의의 변수를 지정
    while ($row = mysqli_fetch_array($result)) {
        $escaped_title = htmlspecialchars($row['title']);
        $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
        // $list변수의 값이 들어있는 li를 결합
        // '.'은 php에서 결합연산자로 쓰임
    }

    $article = array( // 배열 함수
        'title' => 'Welcome!',
        'description' => 'Hello, WEB'
    );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB</title>
</head>
<body>

    <h1><a href="index.php">WEB</a></h1>
    <ol>
        <?=$list?>
    </ol>
    <form action="process_create.php" method="post">
        <p><input type="text" name="title" placeholder="title"></p>
        <p><textarea name="description" placeholder="description"></textarea></p>
        <p><input type="submit" value="submit"></p>
    </form>
</body>
</html>