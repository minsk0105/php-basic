<?php
    session_start();

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        $user_id = "";
    }

    if (isset($_SESSION['user_name'])) {
        $user_name = $_SESSION['user_name'];
    } else {
        $user_name = "";
    }

    if (isset($_SESSION['role'])) {
        $role = $_SESSION['role'];
    } else {
        $role = "";
    }
?>