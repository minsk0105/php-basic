<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>if 조건문</title>
</head>
<body>
    <h1><a href="conjugation.php">WEB</a></h1>
    <ol>
        <?php
            $list = scandir('./Data');
            // scandir()을 통해 Data라는 폴더에 파일을 배열로 담음.

            $i = 0;
            while ($i < count($list)) {
                if ($list[$i] != '.') {
                    if ($list[$i] != '..') {
                        echo "<li><a href=\"conjugation.php?id=$list[$i]\">$list[$i]</a></li>\n";
                    }
                }
                // li > a에 링크를 Data 폴더의 파일들을 경로로 지정하고 해당 링크를 클릭하면 지정된 경로의 파일 내용들을 출력
                $i = $i + 1;
                // 반복문이 실행될 때마다 i값을 1씩 증가시키기
            }


            // echo "<li>$list[0]</li>\n"; // \n은 줄바꿈을 의미
        ?>
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