<?php 
    require('../../includes/conexion.php');

    $nombre = $_POST['nombre_gg'];
    $descripcion = $_POST['descripcion_gg'];
    $precio = $_POST['precio_gg'];
    $imagen = $_POST['imagen_gg'];


// Insertar los datos en la base de datos
$insertar = "INSERT INTO productos(imagen, nombre, descripcion, precio) VALUES ('$imagen','$nombre', '$descripcion', '$precio')";

$resultado= mysqli_query($conn,$insertar);
// Cerrar la conexión
$conn->close();
?>

