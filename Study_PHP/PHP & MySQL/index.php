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

    $update_link = '';
    $delete_link = '';
    $author = '';

    if (isset($_GET['id'])) {
        $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
        // mysqli_real_escape_string을 통해 읽어오거나 전송할 url값을 문자열로 변환시켜 sql조작과 같은 공격을 막을 수 있음.
        $desc_sql = "
            SELECT * FROM topic LEFT JOIN author ON topic.author_id = author.id WHERE topic.id={$filtered_id}
        ";
        $desc_result = mysqli_query($conn, $desc_sql);
        $desc_row = mysqli_fetch_array($desc_result);
        $article = array( // 배열 함수
            'title' => htmlspecialchars($desc_row['title']),
            'description' => htmlspecialchars($desc_row['description']), // htmlspecialchars()를 통해 사용자가 입력한 url값을 문자열화 시켜 외부의 공격을 막아줌
            'name' => htmlspecialchars($desc_row['name'])
        ); // 필요에 따른 데이터 값을 각각의 배열에 담음
        // 배열의 키 값이 숫자가 아닌 문자열인 배열 = 연관배열

        $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
        // $delete_link = '<a href="process_delete.php?id='.$_GET['id'].'">delete</a>';
        $delete_link= '
            <form action="process_delete.php" method="post">
                <input type="hidden" name="id" value="'.$_GET['id'].'">
                <input type="submit" value="delete">
            </form>
        ';

        $author = "<p>by {$article['name']}</p>";
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

    <p>
        <a href="author.php">author</a>
    </p>

    <ol>
        <?=$list?>
    </ol>

    <a href="create.php">create</a>
    <?=$update_link?>
    <?=$delete_link?>

    <h2>
        <?=$article['title']?>
    </h2>
    <p>
        <?=$article['description']?>
    </p>

    <?=$author?>

</body>
</html>