<?php
    if (!$user_id && !$user_name) { ?>
        <script>
            alert ("로그인 후 이용이 가능합니다.");
            history.back();
        </script>
    <?php }
?>