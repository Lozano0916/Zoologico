<?php 
    require('../../includes/conexion.php');

    $nombre = $_POST['nombre_medic_agg'];
    $laboratorio = $_POST['laboratorio_medic_agg'];
    $existencias = $_POST['existencias_medic_agg'];
    $vencimiento = $_POST['fecha_vencimi_agg'];
    $compra = $_POST['fecha_compr_agg'];
    $lote = $_POST['lote_med_agg'];


// Insertar los datos en la base de datos
$insertar = "INSERT INTO medicamentos(nombre, laboratorio, existencias, fecha_vencimiento,fecha_compra,lote) 
VALUES ('$nombre','$laboratorio', '$existencias', '$vencimiento', '$compra', '$lote')";

$resultado= mysqli_query($conn,$insertar);
// Cerrar la conexión
$conn->close();
?>
