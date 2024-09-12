<?php
    file_put_contents('Data/'.$_POST['Title'], $_POST['description']);
    header('Location: function2.php?id='.$_POST['Title']);
?>