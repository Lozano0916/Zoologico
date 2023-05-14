<?php

    require('../../includes/conexion.php');

    
    $id = $_POST['id_eli_recin'];
    $estado = $_POST['eli_estado'];


    // Insertar los datos en la base de datos
    $eliminar = "DELETE FROM recintos WHERE id_recintos ='$id' AND estado ='$estado'";
    $resultado= mysqli_query($conn,$eliminar);
    // Cerrar la conexión
    $conn->close();
?>