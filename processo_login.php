<?php
require_once 'configDB.php';

session_name("CELIN_SID");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['mail'];
    $pass = $_POST['pass'];

    $stmt = $conn->prepare("SELECT id, first_name FROM utenti WHERE login_name = ? AND login_password = ?");
    $stmt->bind_param("ss", $email, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['first_name'] = $user['first_name'];
        header("Location: index.php");
        exit();
    } else {
        header("Location: login.php?error=1");
        exit();
    }
}
?>