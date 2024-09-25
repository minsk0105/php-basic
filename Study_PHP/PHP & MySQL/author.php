<?php
    $conn = mysqli_connect('localhost', 'root', '', 'opentutorials');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB</title>
    <style>
        table {
            border-collapse: collapse;
        }

        td {
            text-align: center;
            padding: 5px 10px;
        }
    </style>
</head>
<body>

    <h1><a href="index.php">WEB</a></h1>
    <p>
        <a href="index.php">topic</a>
    </p>

    <table border="1">
        <tr>
            <td>id</td>
            <td>name</td>
            <td>profile</td>
            <?php
                $sql = "
                    SELECT * FROM author
                ";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) { 
                        $filterd = array (
                            'id' => htmlspecialchars($row['id']),
                            'name' => htmlspecialchars($row['name']),
                            'profile' => htmlspecialchars($row['profile'])
                        )
                    ?>
                    <tr>
                        <td><?=$filterd['id']?></td>
                        <td><?=$filterd['name']?></td>
                        <td><?=$filterd['profile']?></td>
                    </tr>
                <?php } ?>
        </tr>
    </table>

    <form action="process_create_author.php" method="post">
        <p><input type="text" name="name" placeholder="name"></p>
        <p><textarea name="profile" placeholder="profile"></textarea></p>
        <p><input type="submit" value="Create author"></p>
    </form>

</body>
</html>