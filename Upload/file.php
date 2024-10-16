<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>(PHP) 파일 업로드</title>
    <style>
        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type=file] {
            background-color: gray;
            padding: 10px 15px;
            color: #eee;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        input[type=submit] {
            padding: 10px 15px;
            cursor: pointer;
            border: none;
            border-radius: 10px;
            background-color: black;
            color: #eee;
        }
    </style>
</head>
<body>
    
    <form action="upload_process.php" method="post"
    enctype="multipart/form-data" name="uploadForm" id="uploadForm">

        <div>
            <label>- 첨부파일 -</label>
            <input type="file" name="upfile" id="upfile">
        </div>
        <input type="submit" value="업로드">

    </form>

</body>
</html>