<?php 
    require('../../includes/conexion.php');

    $nombre = $_POST['nombre_anim_agg'];
    $especie = $_POST['especie_anim_agg'];
    $sexo = $_POST['sexo_agg'];
    $color = $_POST['color_agg'];
    $edad = $_POST['edad_agg'];
    $estado = $_POST['estado_agg'];


// Insertar los datos en la base de datos
$insertar = "INSERT INTO animal(nombre, especie, sexo, color, edad, estado) VALUES ('$nombre','$especie', '$sexo', '$color', '$edad', '$estado')";

$resultado= mysqli_query($conn,$insertar);
// Cerrar la conexión
$conn->close();
?>

