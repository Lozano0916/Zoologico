<?php

    require('../../includes/conexion.php');

    
    $id = $_POST['id_eli'];
    $producto = $_POST['pro_eli'];


    // Insertar los datos en la base de datos
    $eliminar = "DELETE FROM productos WHERE id_producto ='$id' AND nombre ='$producto'";
    $resultado= mysqli_query($conn,$eliminar);
    // Cerrar la conexión
    $conn->close();
?>