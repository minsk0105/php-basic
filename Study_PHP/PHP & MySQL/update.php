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

    if (isset($_GET['id'])) {
        $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
        $desc_sql = "
        SELECT * FROM topic WHERE id={$filtered_id}
        ";
        $desc_result = mysqli_query($conn, $desc_sql);
        $desc_row = mysqli_fetch_array($desc_result);
        $article = array( // 배열 함수
            'title' => htmlspecialchars($desc_row['title']),
            'description' => htmlspecialchars($desc_row['description'])
        ); // 필요에 따른 데이터 값을 각각의 배열에 담음
        // 배열의 키 값이 숫자가 아닌 문자열인 배열 = 연관배열
    }
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
    <form action="process_update.php" method="post">
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
        <p><input type="text" name="title" placeholder="title" value="<?=$article['title']?>"></p>
        <p><textarea name="description" placeholder="description"><?=$article['description']?></textarea></p>
        <p><input type="submit" value="submit"></p>
    </form>
</body>
</html>