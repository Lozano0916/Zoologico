<?php 
    require('../../../includes/conexion.php');

    $id_medico = $_POST['id_medic_historial'];
    $id_animal = $_POST['id_animal_historial'];
    $fecha = $_POST['fecha_agen_edit'];
    $observaciones = $_POST['obser_historial'];
    


// Insertar los datos en la base de datos
$insertar = "INSERT INTO historial(medico, animal, fecha, observaciones) 
VALUES ('$id_medico','$id_animal', '$fecha', '$observaciones')";

$resultado= mysqli_query($conn,$insertar);
// Cerrar la conexión
$conn->close();
?>
