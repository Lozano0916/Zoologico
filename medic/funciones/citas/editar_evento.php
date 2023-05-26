<?php
require('../../../includes/conexion.php');

// Obtén los datos enviados desde el cliente
$idEvento = $_POST['id'];
$tituloEvento = $_POST['titulo'];
$fechaEvento = $_POST['fecha'];
$colorEvento = $_POST['color'];
$animalEvento = $_POST['animal'];
$razonEvento = $_POST['razon'];

try {
    // Aquí debes agregar la lógica para actualizar el evento en tu base de datos o sistema de almacenamiento

    // Ejemplo: Actualizar el evento en una base de datos MySQL usando PDO
    $query = "UPDATE eventos SET titulo = :titulo, fecha = :fecha, color = :color, animal = :animal, razon = :razon WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':titulo', $tituloEvento);
    $stmt->bindParam(':fecha', $fechaEvento);
    $stmt->bindParam(':color', $colorEvento);
    $stmt->bindParam(':animal', $animalEvento);
    $stmt->bindParam(':razon', $razonEvento);
    $stmt->bindParam(':id', $idEvento);
    $stmt->execute();

    // Envía una respuesta de éxito al cliente
    echo "Evento actualizado correctamente";
} catch (PDOException $e) {
    // Maneja los errores en caso de que ocurra una excepción durante la actualización
    echo "Error al actualizar el evento: " . $e->getMessage();
}
?>
