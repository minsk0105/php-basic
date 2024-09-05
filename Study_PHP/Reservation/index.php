<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>예약내역 페이지</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>예약내역 페이지</h1>
    <form action="submit.php" method="post">
        <input type="text" name="name" placeholder="이름"><br>
        <input type="text" name="address" placeholder="주소"><br>
        <input type="submit" value="확인"><br>
        <a href="index.php" style="cursor: pointer;">Home</a>
    </form>

    <?php
        function print_list() {
            $i = 0;
            $list = scandir('./User');
            while ($i < count($list)) {
                if ($list[$i] != ".") {
                    if ($list[$i] != "..") {
                        echo "<td>$list[$i]</td>";
                    }
                }
            
                $i = $i + 1;
            }
        }

        function print_nation() {
            $i = 0;
            $list = scandir('./User');
            while ($i < count($list)) {
                if ($list[$i] != ".") {
                    if ($list[$i] != "..") {
                        $fileContents = file_get_contents('User/'.$list[$i]);
                        echo "<td>".htmlspecialchars($fileContents)."</td>";
                    }
                }
                $i = $i + 1;
            }
        }
    ?>

    <table>
        <thead>
            <tr>
                <th>성명</th>
                <th>주소</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                    // var_dump($list);
                    // if (isset($_GET['name'])) {
                    //     $list = $_GET['name'];
                    //     echo "<td>$list</td>";
                    // } else {
                    //     echo "<td>안녕하세요</td>";
                    // }
                    
                    print_list();
                ?>

            </tr>

            <tr>
                <td>
                    <?php
                        print_nation();
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>