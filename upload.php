<?php
session_name("CELIN_SID");
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $userId = $_SESSION['user_id'];
    $uploadDir = 'uploads/';

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mimeType = $finfo->file($file['tmp_name']);

    if ($mimeType === 'image/png') {
        $destination = $uploadDir . $userId . '.png';

        if (move_uploaded_file($file['tmp_name'], $destination)) {
            header("Location: index.php");
            exit();
        } else {
            echo "Errore: Verifica i permessi della cartella uploads.";
        }
    } else {
        echo "Errore: Solo PNG ammessi.";
    }
}