<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <form action="form.php" method="post"> <!-- submit이 속해있는 form태그가 가르키는 경로에 값을 전달 -->
        <input type="text" name="title" placeholder="title"><br><br>
        <textarea name="description"></textarea><br> <!-- 입력한 값을 name의 속성값으로 전달 -->
        <input type="submit" value="submit">
    </form>
</body>
</html>