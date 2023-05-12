<?php

    require('../../includes/conexion.php');

    
    $id = $_POST['id_eli_emple'];
    $empleado = $_POST['pro_eli_emple'];


    // Insertar los datos en la base de datos
    $eliminar = "DELETE FROM empleados WHERE id_empleado ='$id' AND nombre ='$empleado'";
    $resultado= mysqli_query($conn,$eliminar);
    // Cerrar la conexión
    $conn->close();
?>