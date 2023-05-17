<?php

require('../../../includes/conexion.php');

// Obtener el ID del alimento y la cantidad ingresada
$alimentoId = $_POST['alimentoId'];
$cantidad = $_POST['cantidad'];

// Restar la cantidad utilizada de la base de datos
$query = "UPDATE alimentos SET existencias = existencias - $cantidad WHERE id_alimento = '$alimentoId'";
$result = $conn->query($query);

// Verificar si la actualización se realizó correctamente
if ($result) {
  echo 'OK'; // Enviar una respuesta de éxito al cliente
} else {
  echo 'Error'; // Enviar una respuesta de error al cliente
}

// Cerrar la conexión con la base de datos

// ... Código para cerrar la conexión ...
?>
