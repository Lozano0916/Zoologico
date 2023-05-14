<?php

    require('../../includes/conexion.php');

    
    $id = $_POST['id_eli_alim'];
    $nombre = $_POST['eli_nombre_alim'];


    // Insertar los datos en la base de datos
    $eliminar = "DELETE FROM alimentos WHERE id_alimento ='$id' AND nombre ='$nombre'";
    $resultado= mysqli_query($conn,$eliminar);
    // Cerrar la conexión
    $conn->close();
?>