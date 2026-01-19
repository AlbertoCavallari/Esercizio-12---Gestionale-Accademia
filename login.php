<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionale Accademia - Login</title>
    <link rel="stylesheet" href="style/styleLogin.css">
</head>
<body>
    <div class="login-container">
        <h1>Accademia Militare</h1>
        <p class="subtitle">Accesso Personale Autorizzato</p>
        
        <form action="processo_login.php" method="POST">
            <label for="mailInput">Email Ministeriale</label>
            <input type="text" name="mail" id="mailInput" placeholder="nome.cognome@difesa.circolo.gov" required>

            <label for="passwordInput">Password</label>
            <input type="password" name="pass" id="passwordInput" placeholder="••••••••" required>

            <button type="submit">Identificazione</button>
        </form>
        
        <?php if(isset($_GET['error'])): ?>
            <div id="errorDisplay" class="error-msg" style="display:block;">Credenziali non valide.</div>
        <?php endif; ?>
    </div>
</body>
</html>