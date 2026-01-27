<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_name("CELIN_SID");
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

require_once 'configDB.php';

$user_id = $_SESSION['user_id'];

$query = "SELECT u.first_name, u.last_name, u.login_name, r.nome_ruolo, r.specifica_militare 
          FROM utenti u 
          JOIN ruoli r ON u.ruolo_id = r.id 
          WHERE u.id = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    $nome_completo = $user['first_name'] . " " . $user['last_name'];
    $email = $user['login_name'];
    
    $tipo_personale = ($user['nome_ruolo'] == 'INSTRUCTOR') ? "Istruttore" : $user['nome_ruolo'];
    if ($user['nome_ruolo'] == 'ADMINISTRATOR') $tipo_personale = "Amministratore";
    if ($user['nome_ruolo'] == 'CADET') $tipo_personale = "Cadetto";

    $gradi = [
        'MILITARY_GENERAL' => 'Generale',
        'MILITARY_CAPTAIN' => 'Capitano',
        'MILITARY_LIEUTENANT' => 'Tenente',
        'MILITARY_SERGEANT' => 'Sergente',
        'CADET_GRADE_5' => 'Cadetto Grado 5',
        'NON_MILITARY' => 'Civile'
    ];
    
    $grado_militare = $gradi[$user['specifica_militare']] ?? $user['specifica_militare'];
} else {
    die("Utente non trovato.");
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

        <div class="profile-card">
            <div class="profile-photo">
                <img src="uploads/<?php echo $user_id; ?>.png" onerror="this.src='uploads/default.png';" alt="Profilo">
            </div>

            <div class="profile-details">
                <h2><?php echo htmlspecialchars($nome_completo); ?></h2>
                <a href="mailto:<?php echo htmlspecialchars($email); ?>" class="profile-email">
                    <?php echo htmlspecialchars($email); ?>
                </a>

                <div class="info-group">   
                    <p><strong>Tipo di personale:</strong> <?php echo htmlspecialchars($tipo_personale); ?>;</p>
                    <p><strong>Grado militare:</strong> <?php echo htmlspecialchars($grado_militare); ?>.</p>
                </div>

                <form action="upload.php" method="post" enctype="multipart/form-data" class="upload-form">
                    <label>Seleziona una nuova immagine (PNG):</label>
                    <div class="upload-input-container">
                        <input type="file" name="file" accept="image/png">
                    </div>
                    <input type="submit" value="Invia" class="btn-submit">
                </form>
            </div>
        </div>
        
        <p class="session-info">Loggato come: <strong><?php echo htmlspecialchars($_SESSION['first_name']); ?></strong> (ID: <?php echo $user_id; ?>)</p>
        
        <a href="logout.php" class="btn-logout">Logout</a>
    </div>

</body>
</html>