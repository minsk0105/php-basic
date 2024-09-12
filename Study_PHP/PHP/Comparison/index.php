<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>if 조건문</title>
</head>
<body>
    <h1><a href="index.php">WEB</a></h1>
    <ol>
        <li><a href="index.php?id=HTML">HTML</a></li>
        <li><a href="index.php?id=CSS">CSS</a></li>
        <li><a href="index.php?id=JavaScript">JavaScript</a></li>
        <li><a href="index.php?id=PHP">PHP</a></li>
    </ol>

    <h2>
        <?php
            if (isset($_GET['id'])) { // URL 창에 id값이 있다면
                echo $_GET['id']; // 해당 값을 출력
            } else {
                echo "Welcome"; // id값이 없다면 "Welcome"을 출력
            }
        ?>
    </h2>

    <p>
        <?php
            if (isset($_GET['id'])) {
                echo file_get_contents("Data/".$_GET['id']); // 값이 있다면 Data 폹더에 id값과 같은 이름의 파일의 텍스트를 출력
            } else {
                echo "Hello, PHP!"; // 값이 없다면 해당 문자열 출력
            }
        ?>
    </p>
</body>
</html>