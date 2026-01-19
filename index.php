<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionale Accademia - Home</title>
    <link rel="stylesheet" href="style/styleIndex.css">
</head>
<body>
    
    <h1> Benvenuto nel Gestionale dell'Accademia </h1>
    <br>

    <p> Sei loggato come utente con ID: <?php echo htmlspecialchars($_SESSION['user_id']); ?> </p>
    <br>
    <a href="/pages/logout.php">Logout</a>

</body>
</html> 