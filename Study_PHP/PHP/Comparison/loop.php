<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>반복문</title>
</head>
<body>
    <h1>while문</h1>
    <?php
        echo '1<br>';
        $i = 0;
        while ($i < 3) { // i가 3보다 작을 때만 실행 / 0부터 시작
            echo '2<br>';
            $i = $i + 1;
        } // 조건이 true일 때까지 실행
            
        echo '3<br>';
    ?>
</body>
</html>