<?php

    require('../../includes/conexion.php');

    
    $id = $_POST['id_eli_medic'];
    $medicamento = $_POST['eli_medica'];


    // Insertar los datos en la base de datos
    $eliminar = "DELETE FROM medicamentos WHERE id_medicamento ='$id' AND nombre ='$medicamento'";
    $resultado= mysqli_query($conn,$eliminar);
    // Cerrar la conexión
    $conn->close();
?>