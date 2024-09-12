<!-- mysqli 문법 -->
<?php
    // <접속>
    $conn = mysqli_connect("localhost", "root", "1234", "opentutorials"); //MySQL 연동
    // 왼쪽부터 데이터베이스 서버의 주소, 유저 이름, 비밀번호, 데이터베이스 이름

    // <쿼리>
    // mysqli_query = mysqli_connect를 통해 연결된 객체를 이용하여 MySQL 쿼리를 실행시키는 함수
    $sql = "
        INSERT INTO topic
            (title, description, created)
            VALUES(
                'MySQL',
                'MySQL is ..',
                NOW()
            )
    ";
    $result = mysqli_query($conn, $sql);
    if ($result === false) {
        echo mysqli_error($conn); // 만약 $result값이 false일 때 에러 난 부분을 출력해줌
    }
    // INSERT INTO topic = topic이라는 이름의 테이블에 데이터를 추가
    //(title, description, created) = 데이터를 추가할 각각의 value값
    //VALUES(....) = 위의 명시된 value값의 순서대로 추가할 값
    //↑↑↑ title = MySQL; description = MySQL is ..; created = NOW()[현재 시간을 출력]
?>