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

    } else {

        echo "파일이 없음";
        exit();
    }
?>