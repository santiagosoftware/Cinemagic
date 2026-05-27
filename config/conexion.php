<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "Cinemagic";

try {
    $conn = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $user, $password);

    // Mostrar errores de PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Conexión exitosa";

} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

?>