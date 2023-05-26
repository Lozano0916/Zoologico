<?php
require('../../../includes/conexion.php');


$titulo = $_POST['titulo'];
$cita = $_POST['cita'];
$fecha = $_POST['fecha'];
$color = $_POST['color'];
$animal = $_POST['animal'];
$razon = $_POST['razon'];

// Preparar la consulta SQL para insertar el evento en la base de datos
$sql = "INSERT INTO agendar_citas (title, animal, `start`, razon_cita, color  ) VALUES ('$titulo','$animal', '$fecha', '$razon', '$color')";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
  echo 'Evento guardado exitosamente';
} else {
  echo 'Error al guardar el evento: ' . $conn->error;
}

$conn->close();
?>