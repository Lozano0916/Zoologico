<?php 
    require('../../includes/conexion.php');

    $tipo = $_POST['tipo_empleado_agg'];
    $nombre = $_POST['nombre_empleado_agg'];
    $email = $_POST['email_empleado_agg'];
    $sexo = $_POST['sexo_empleado_agg'];
    $numero = $_POST['numero_empleado_agg'];
    $edad = $_POST['edad_empleado_agg'];
    $direccion = $_POST['direccion_empleado_agg'];
    $contraseña=$_POST['contraseña_empleado_agg'];


// Insertar los datos en la base de datos
$insertar = "INSERT INTO empleados(id_tipo_empleado, nombre, email, sexo, numero_telefonico, edad, direccion,contraseña) 
VALUES ('$tipo','$nombre', '$email', '$sexo','$numero','$edad','$direccion','$contraseña')";

$resultado= mysqli_query($conn,$insertar);
// Cerrar la conexión
$conn->close();
?>

