<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>함수(Function)</title>
</head>
<body>
    <h1>WEB</h1>
    <ol>
        <li><a href="index2.php?id=HTML">HTML</a></li>
        <li><a href="index2.php?id=CSS">CSS</a></li>
        <li><a href="index2.php?id=JavaScript">JavaScript</a></li>
        <!-- a 링크를 클릭했을 때 해당 경로의 id값을 URL에 출력 -->
    </ol>

    <h2>
        <?php
            echo $_GET['id']; // 불러온 id값을 h2태그의 텍스트로 출력
        ?>
    </h2>

    <p>
        <?php
            echo file_get_contents("Data/".$_GET['id']);
            // Data 폴더 안에 URL의 id값과 같은 이름의 파일을 불러와 텍스트를 출력
            // 위의 함수는 폴더 안에 파일을 읽어주는 함수
        ?>
    </p>
</body>
</html>