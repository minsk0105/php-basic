<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function</title>
</head>
<body>
    <h1>Function</h1>
    <h2>Basic</h2>
    <?php
        function basic() {
            print("bake and shake <br>");
            print("welcome to korea <br>");
        }

        basic(); // 괄호에 값을 입력하면 해당 입력 값을 basic() 함수가 받아옴
    ?>

    <h1>입력값</h1>
    <h2>parameter &amp; argument</h2>
    <?php
        function sum($left, $right) { // 각각의 변수는 parameter
            print($left + $right);
            // 변수를 통해 입력값을 받아와 서로 더한다
            print("<br>");
        }

        sum(2, 4); // 괄호 안 숫자는 받아올 값
        sum(12, 12) // 괄호 안 숫자는 argument
    ?>

    <h1>출력값</h1>
    <h2>return</h2>
    <?php
        function sum2($left, $right) {
            return $left + $right;
            // return 뒤에 오는 코드는 실행되지 않음
        }

        print(sum2(2, 4));
        file_put_contents("result.txt", sum2(2, 4));
    ?>
</body>
</html>