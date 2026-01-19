<?php
    session_name("CELIN_SID");
    session_start();
    $_SESSION = array();
    session_destroy();
    header("Location: login.php");
    exit();
?>