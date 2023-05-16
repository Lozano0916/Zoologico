<?php 
    require('../../includes/conexion.php');

    $nombre = $_POST['nombre_gg'];
    $descripcion = $_POST['descripcion_gg'];
    $precio = $_POST['precio_gg'];
    $imagen = $_POST['imagen_gg'];
    $cantidad = $_POST['cantidad_gg'];


// Insertar los datos en la base de datos
$insertar = "INSERT INTO productos(imagen, nombre, descripcion, precio, cantidad) VALUES ('$imagen','$nombre', '$descripcion', '$precio','$cantidad')";

$resultado= mysqli_query($conn,$insertar);
// Cerrar la conexión
$conn->close();
?>

