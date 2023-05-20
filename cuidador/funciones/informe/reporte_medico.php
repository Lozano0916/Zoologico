<?php 
    require('../../../includes/conexion.php');

    $cuidador = $_POST['nom_repor'];
    $animal = $_POST['animal_re'];
    $fecha = $_POST['fecha_act'];
    $reporte = $_POST['contenido_repo'];
    $lugar = $_POST['animal_recinto']; 


// Insertar los datos en la base de datos
$insertar = "INSERT INTO reportes_medico(empleado, animal, lugar, fecha,contenido) VALUES ('$cuidador','$animal','$lugar', '$fecha','$reporte')";

$resultado= mysqli_query($conn,$insertar);
// Cerrar la conexión
$conn->close();
?>