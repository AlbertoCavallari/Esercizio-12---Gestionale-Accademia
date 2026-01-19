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
        
        <label for="mailInput">Email Ministeriale</label>
        <input type="text" id="mailInput" placeholder="nome.cognome@difesa.circolo.gov">

        <label for="passwordInput">Password</label>
        <input type="password" id="passwordInput" placeholder="••••••••">

        <button type="button" onclick="effettuaLogin()">Identificazione</button>
        
        <div id="errorDisplay" class="error-msg">Credenziali non valide.</div>
    </div>

    <script>
        async function effettuaLogin() {
            try {
                console.log("Tentativo di caricamento di utenti.json...");
                const risposta = await fetch('credenziali.json');
                
                if (!risposta.ok) {
                    throw new Error(`Errore HTTP! Stato: ${risposta.status}`);
                }

                const utenti = await risposta.json();
                console.log("Database caricato correttamente:", utenti);

                const mail = document.getElementById('mailInput').value;
                const pass = document.getElementById('passwordInput').value;

                const utente = utenti.find(u => 
                    u.credentials.login_name === mail && 
                    u.credentials.login_password === pass
                );

                if (utente) {
                    if (utente) {
                        alert("Successo!");
                        // Mandiamo l'ID a un file PHP che inizializzerà la sessione vera
                        window.location.href = "set_session.php?id=" + utente.user_id;
                    }
                } else {
                    alert("Credenziali errate.");
                }

            } catch (e) {
                console.error("ERRORE DETTAGLIATO:", e.message);
                alert("Errore tecnico: " + e.message);
            }
        }
    </script>
</body>
</html>