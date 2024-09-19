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
        $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
        // $list변수의 값이 들어있는 li를 결합
        // '.'은 php에서 결합연산자로 쓰임
    }

    $article = array( // 배열 함수
        'title' => 'Welcome!',
        'description' => 'Hello, WEB'
    );

    if (isset($_GET['id'])) {
        $desc_sql = "
        SELECT * FROM topic WHERE id={$_GET['id']}
        ";
        $desc_result = mysqli_query($conn, $desc_sql);
        $desc_row = mysqli_fetch_array($desc_result);
        $article = array( // 배열 함수
            'title' => $desc_row['title'],
            'description' => $desc_row['description']
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

    <a href="create.php">create</a>

    <h2>
        <?=$article['title']?>
    </h2>
    <p>
        <?=$article['description']?>
    </p>

</body>
</html>