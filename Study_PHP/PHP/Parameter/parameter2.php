<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>WEB</h1>
    <ol>
        <li><a href="parameter2.php?id=HTML">HTML</a></li>
        <li><a href="parameter2.php?id=CSS">CSS</a></li>
        <li><a href="parameter2.php?id=JavaScript">JavaScript</a></li>
        <!-- a 링크를 클릭했을 때 해당 경로의 id값을 URL에 출력 -->
    </ol>
    <h2>
        <?php
            echo $_GET['id']; // 불러온 id값을 h2태그의 텍스트로 출력
        ?>
    </h2>
    <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo voluptatem maxime pariatur ipsa officia dolores minus incidunt provident nam, facilis voluptates sit reiciendis mollitia expedita optio, atque possimus quae reprehenderit.
    </p>
</body>
</html>