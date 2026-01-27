<?php
session_name("CELIN_SID");
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionale Accademia - Home</title>
    <link rel="stylesheet" href="style/styleIndex.css">
</head>
<body>
    
    <div class="container">
        <h1>Benvenuto nel Gestionale dell'Accademia</h1>

        <div class="info-box">
            <p>Sei loggato come: <strong><?php echo htmlspecialchars($_SESSION['first_name']); ?></strong></p>
            <p>ID Utente: <strong><?php echo htmlspecialchars($_SESSION['user_id']); ?></strong></p>
        </div>
        
        <a href="logout.php" class="btn-logout">Logout</a>
    </div>

</body>
</html>