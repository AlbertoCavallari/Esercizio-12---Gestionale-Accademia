<?php
session_start();
if (isset($_GET['id'])) {
    $_SESSION['user_id'] = $_GET['id'];
    header('Location: index.php'); 
    exit();
}
?>