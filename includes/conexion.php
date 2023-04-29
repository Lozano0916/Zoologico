<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "zoologico";
$port="3307";

// Establecer la conexión
$conn = new mysqli($servername, $username, $password, $dbname,$port);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}

?>
