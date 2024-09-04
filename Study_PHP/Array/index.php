<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array(배열)</title>
</head>
<body>
    <h1>Array</h1>
    <?php
        $nation = array('korea', 'japan', 'usa', 'china');
        // $nation은 배열을 담고있는 함수
        echo $nation[1].'<br>';
        echo $nation[3].'<br>';
        // 배열에 담겨있는 값을 꺼냄
        echo var_dump(count($nation)); // count() = 배열의 길이를 구하는 함수
        array_push($nation, 'Belgium', 'Germany'); // $nation 리스트 변수에 배열을 추가
        // print_r($nation);
        var_dump($nation);
    ?>
</body>
</html>