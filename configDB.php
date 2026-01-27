<?php
$host = "localhost";
$user = "root";
$password = "";
$db_name = "accademia_idunn";

$conn = new mysqli($host, $user, $password, $db_name);

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
?>