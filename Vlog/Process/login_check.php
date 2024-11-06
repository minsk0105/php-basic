<?php
    if (!$user_id && !$user_name) {
        echo "
            <script>
                alert ('로그인 후 이용해 주세요.');
                history.back();
            </script>
        ";
    }
?>