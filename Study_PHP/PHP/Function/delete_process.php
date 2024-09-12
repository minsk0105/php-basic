<?php
    unlink('Data/'.$_POST['id']);
    header('Location: function2.php');
?>