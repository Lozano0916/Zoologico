<?php 
    require('../../includes/conexion.php');

    $nombre = $_POST['nombre_'];
    $descripcion = $_POST['descripcion_'];
    $precio = $_POST['precio_'];
    $imagen = $_POST['imagen_'];


// Insertar los datos en la base de datos
$insertar = "INSERT INTO productos(id_producto, imagen, nombre, descripcion, precio) VALUES (NULL, '$imagen','$nombre', '$descripcion', '$precio')";

$resultado= mysqli_query($conn,$insertar);
// Cerrar la conexión
$conn->close();
?>

