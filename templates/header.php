<?php

require_once __DIR__ . '/../utilities/functions.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionale Accademia</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <header>
        <img src="../circolo_galattico_definito.jpg">
        <h1> Gestionale dell'Accademia<h1>

        <button onClick="handleLogout()"> Logout </button>
    </header>





<script>
    function handleLogout(){
        <?php
            redirect("../pages/login.php");
            session_unset();
            session_destroy();    
        ?>
    }
</script>