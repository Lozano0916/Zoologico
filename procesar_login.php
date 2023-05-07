<?php
require_once('includes/conexion.php');

$nombre = $_POST['nombre'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['nombre']=$nombre;


$consulta="SELECT*FROM empleados where nombre='$nombre' and contraseña='$contraseña'";
$resultado=mysqli_query($conn,$consulta);

$filas=mysqli_fetch_array($resultado);

if($filas['id_tipo_empleado']==1){ //administrador
    header("location: admin/admin.php");

}else
if($filas['id_tipo_empleado']==2){ //medico
header("location: medic/medic.php");
}
else{
    ?>
    <?php
    include("index.php");
    ?>
    <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>
