<?php
require('../../../includes/conexion.php');

// Verificar si se recibió el ID del evento a eliminar
if (isset($_POST['id'])) {
    $idEvento = $_POST['id'];

    // Realizar la consulta para eliminar el evento de la base de datos
    $query = "DELETE FROM agendar_citas WHERE id_agendar = '$idEvento'";

    if (mysqli_query($conn, $query)) {
        // Si la eliminación es exitosa, enviar una respuesta exitosa al cliente
        echo 'Evento eliminado correctamente';
    } else {
        // Si hay algún error en la eliminación, enviar un mensaje de error al cliente
        echo 'Error al eliminar el evento: ' . mysqli_error($conn);
    }
} else {
    // Si no se recibió el ID del evento, enviar un mensaje de error al cliente
    echo 'No se ha proporcionado un ID de evento válido';
}

$conn->close();
?>
