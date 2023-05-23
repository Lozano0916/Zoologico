<?php
require('../../../includes/conexion.php');


$cita = $_POST['cita'];
$fecha = $_POST['fecha'];
$color = $_POST['color'];
$animal = $_POST['animal'];
$razon = $_POST['razon'];

// Preparar la consulta SQL para insertar el evento en la base de datos
$sql = "INSERT INTO agendar_citas (animal, fecha_cita, razon_cita, color  ) VALUES ('$animal', '$fecha', '$razon', '$color')";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
  echo 'Evento guardado exitosamente';
} else {
  echo 'Error al guardar el evento: ' . $conn->error;
}
$busqueda = "SELECT animal,fecha_cita,color FROM agendar_citas";
$result = $conn->query($busqueda);

$eventos = array();

while ($row = $result->fetch_assoc()) {
    $evento = array(
        'title' => $row['animal'],
        'start' => $row['fecha_cita'],
        'color' => $row['color'],
        // Agrega aquí otros campos que desees mostrar en el calendario
    );
    $eventos[] = $evento;
}

// Devolver los eventos como respuesta al Ajax
echo json_encode($eventos);
$conn->close();
?>
