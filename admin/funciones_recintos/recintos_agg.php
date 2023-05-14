<?php 
    require('../../includes/conexion.php');

    $tipo = $_POST['tipo_recin_agg'];
    $nanimal = $_POST['n_recin_agg'];
    $estado = $_POST['estado_recin_agg'];


// Insertar los datos en la base de datos
$insertar = "INSERT INTO recintos(id_tipo, n_animales, estado) VALUES ('$tipo','$nanimal', '$estado')";

$resultado= mysqli_query($conn,$insertar);
// Cerrar la conexión
$conn->close();
?>

