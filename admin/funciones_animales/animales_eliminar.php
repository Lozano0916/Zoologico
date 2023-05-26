<?php

    require('../../includes/conexion.php');

    
    $id = $_POST['id_eli_anim'];
    $nombre = $_POST['eli_nombre_anim'];


    // Insertar los datos en la base de datos
    $eliminar = "DELETE FROM animal WHERE id ='$id' AND nombre ='$nombre'";
    $resultado= mysqli_query($conn,$eliminar);
    // Cerrar la conexión
    $conn->close();
?>