<?php
require_once('includes/conexion.php');

$nombre = $_POST['nombre'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['nombre']=$nombre;

$contraseña_encriptada = password_hash($contraseña, PASSWORD_DEFAULT);


$consulta="SELECT*FROM empleados where nombre='$nombre' and contraseña='$contraseña'";
$resultado=mysqli_query($conn,$consulta);

$filas=mysqli_fetch_array($resultado);

if(mysqli_num_rows($resultado) > 0) {
   if($filas['id_tipo_empleado']==1){ //administrador
      header("location: admin/admin.php");
   } else if($filas['id_tipo_empleado']==2){ //medico
      header("location: medic/medic.php");
   }   
} else {
   echo "<script>alert('Usuario o contraseña incorrectas'); window.location.href = 'Iniciosesion.html';</script>";
}

mysqli_free_result($resultado);
mysqli_close($conn);
?>
