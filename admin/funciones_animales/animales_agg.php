<?php 
    require('../../includes/conexion.php');

    $nombre = $_POST['nombre_anim_agg'];
    $especie = $_POST['especie_anim_agg'];
    $ejemplares = $_POST['n_ejemplares_agg'];


// Insertar los datos en la base de datos
$insertar = "INSERT INTO animales(nombre, especie, numero_ejemplares) VALUES ('$nombre','$especie', '$ejemplares')";

$resultado= mysqli_query($conn,$insertar);
// Cerrar la conexión
$conn->close();
?>

