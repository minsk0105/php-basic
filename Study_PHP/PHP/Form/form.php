<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form.php</title>
</head>
<body>
    <?php
        file_put_contents('Data/'.$_POST['title'], $_POST['description']);
        // echo "<p>title : ".$_GET['title']."</p>";
        // echo "<p>description : ".$_GET['description']."</p>";
    ?>
</body>
</html>