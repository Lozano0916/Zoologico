<?php 
    require('../../includes/conexion.php');

    $nombre = $_POST['nombre_alim_agg'];
    $tipo = $_POST['tipo_alim_agg'];
    $provedor = $_POST['provedor_alim_agg'];
    $precio = $_POST['precio_alim_agg'];
    $existencias = $_POST['existen_alim_agg'];
    $fecha = $_POST['fecha_alim_agg'];
    


// Insertar los datos en la base de datos
$insertar = "INSERT INTO alimentos(nombre, tipo, provedor, precio, existencias, fecha_vencimiento) 
VALUES ('$nombre','$tipo', '$provedor', '$precio', '$existencias', '$fecha')";

$resultado= mysqli_query($conn,$insertar);
// Cerrar la conexión
$conn->close();
?>