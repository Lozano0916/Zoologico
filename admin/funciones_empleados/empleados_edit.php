<?php
    require('../../includes/conexion.php');

    $id = $_POST['id_empleado'];
    $tipo_empleado = $_POST['tipo_empleado'];
    $nombre=$_POST['nombre_empleado'];
    $email=$_POST['email_empleado'];
    $sexo=$_POST['sexo_empleado'];
    $numero=$_POST['numero_empleado'];
    $edad=$_POST['edad_empleado'];
    $direccion=$_POST['direccion_empleado'];
    


    $editar = "UPDATE empleados SET id_tipo_empleado='$tipo_empleado',nombre='$nombre',
    email='$email',sexo='$sexo', numero_telefonico='$numero',edad='$edad', 
    direccion='$direccion' WHERE id_empleado='$id'";
    
    $resultado = mysqli_query($conn,$editar);
    
    
    mysqli_close($conn);

?>