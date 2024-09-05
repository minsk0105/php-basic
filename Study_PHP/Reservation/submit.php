<?php
    file_put_contents('User/'.$_POST['name'], $_POST['address']);
    echo $_POST['name'], $_POST['address'];
    header('Location: index.php?name='.$_POST['name'].'&address='.$_POST['address']);
?>