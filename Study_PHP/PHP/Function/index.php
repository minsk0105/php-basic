<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>함수(Function)</title>
</head>
<body>
    <h1>Function</h1>
    <?php
        $str = "Lorem ipsum dolor sit,
        amet consectetur adipisicing elit.
        Unde pariatur sint tempora voluptatum vel,
        sequi blanditiis architecto eius,

        numquam distinctio odit velit qui debitis corporis possimus odio quas.
        Quisquam,
        suscipit!";
        echo $str;
    ?>
    <h2>strlen()</h2> <!-- strlen() 함수 -->
    <?php
        echo strlen($str); // $str의 텍스트의 길이를 출력 ex) 225개
    ?>
    <h2>nl2br()</h2> <!-- nl2br() 함수 -->
    <?php
        echo nl2br($str); // $str변수에 줄바꿈이 되어있는 부분을 함수를 통해 줄바꿈 해줌.
    ?>
</body>
</html>