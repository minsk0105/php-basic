<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Conditional</h1>
    <h2>if</h2>
    <?php
        echo '1<br>'; // 해당 값은  true
        if (true) {
            echo '2-1<br>'; // 만약 true라는 조건이 성립하면 해당 코드를 출력
        } else {
            echo '2-2<br>'; // true가 아닌 false라면 해당 코드를 출력
        } // 위의 조건문은 true이기 때문에 2-1이 출력된다.
        echo '3<br>';
    ?>
</body>
</html>