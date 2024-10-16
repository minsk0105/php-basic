<?php
    $conn = mysqli_connect('localhost', 'root', '', 'upload');

    if (isset($_FILES['upfile']) && $_FILES['upfile']['tmp_name'] !== "") {

        // ['tmp_name']은 업로드된 파일을 서버에 임시 저장하는 역할
        // 출력했을 때 빈 문자열이면 파일이 업로드되지 않음을 뜻함. 문자열이 있다면 업로드됨.
        
        $file = $_FILES['upfile'];
        $upload_directory = 'data/'; // 업로드할 파일 경로

        $ext_str = "hwp,xls,doc,xlsx,docx,pdf,jpg,gif,png,txt,ppt,pptx";
        // 해당 문자열은 띄어쓰기까지 인식하기 때문에 유의바람

        $allowed_extensions = explode(',', $ext_str);
        // $ext_str의 문자열들을 explode를 통해 ','로 구분하여 배열로 변환

        // 파일 크기 제한(지정)
        $max_file_size = 5242880; // 5MB
        $ext = strtolower(substr($file['name'], strrpos($file['name'], '.') + 1));
        // substr: 문자열을 잘라주는 함수 / strrpos: 문자열을 검색하는 함수
        // 위의 함수는 대소문자를 구분하기 때문에 strtolower을 통해 소문자로 모두 변환

        // 확장자 체크
        if (!in_array($ext, $allowed_extensions)) {
            echo "업로드할 수 없는 확장자입니다.";
            return false;
        }

        // 파일 크기 체크
        if ($file['size'] >= $max_file_size) {
            echo "5MB 까지만 업로드 가능합니다.";
            return false;
        }

        // 파일 이름 생성
        $path = md5(microtime()) . '.' . $ext;
        // md5로 해시로 변환 후 microtime()로 마이크로 초단위를 포함한 현재시간을 출력하여 중복 가능성을 줄여줌.
        // . '.' . $ext: 뒤에 파일 확장자 표시

        // uniqid(): 특수한 ID를 생성
        // rand(): 임의의 숫자를 랜덤으로 생성
        // uniqid("", true): 매개변수를 true로 설정하면 밀리초 값을 더 많은 엔트로피 값으로 대체 ID를 생성
        
        if (move_uploaded_file($file['tmp_name'], $upload_directory.$path)) {
            // move_uploaded_file: 서버로 전송된(임시저장) 파일을 저장할 때 사용하는 함수
            // 위의 함수를 통해 임시 저장된 파일을 $uploaded_directory인 파일 경로에 $path형태의 파일 이름으로 저장한다는 뜻

            $query = "INSERT INTO upload_file (file_id, name_orig, name_save, reg_time)
                VALUES (?,?,?,now())
            "; // VALUES에 ? 변수를 넣어 사용자 입력 값으로 대체
            // 또한 ? 자리 표시자를 통해 입력값만 대체하기 때문에 성능적으로 좋음

            $file_id = md5(uniqid(rand()));
            $name_orig = $file['name'];
            $name_save = $path;

            $push_stmt = mysqli_prepare($conn, $query);
            // mysqli_prepare: 실행할 SQL 쿼리문을 미리 준비하고, 자리 표시자를 사용할 수 있게 함
            // mysqli_query: SQL 쿼리를 직접 실행

            $bind = mysqli_stmt_bind_param($push_stmt, "sss", $file_id, $name_orig, $name_save);
            // sss: 문자열이 3개라는 의미

            $execute = mysqli_stmt_execute($push_stmt); // 쿼리 실행

            mysqli_stmt_close($push_stmt); // 쿼리 종료

            echo "<h3>파일 업로드 성공</h3>";
            echo '<a href="file_list.php">업로드 파일 목록</a>'."<br>";
            echo '<a href="file.php">홈으로 돌아가기</a>'."<br>";
        }

    } else {

        echo "파일이 없음";
        exit();
    }

    mysqli_close($conn);
?>