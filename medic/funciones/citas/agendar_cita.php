<?php
require('../../../includes/conexion.php');


$resultado = mysqli_query($conn, "SELECT * FROM agendar_citas");

// Verificar si la consulta tuvo resultados
if ($resultado) {
    // Crear un arreglo para almacenar los resultados
    $datos = array();

    // Recorrer los resultados y agregarlos al arreglo
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $datos[] = $fila;
    }

    // Convertir el arreglo a formato JSON
    $json = json_encode($datos);

    // Mostrar el JSON
    echo $json;
} else {
    // Mostrar mensaje de error si la consulta falla
    echo 'Error en la consulta: ' . mysqli_error($conn);
}



$conn->close();
?>
