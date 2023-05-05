//session_start();
//
//// Conectar a la base de datos
//require_once 'includes/conexion.php';
//
//// Verificar si se envió el formulario
//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//
//	// Obtener los datos del formulario
//	$username = $_POST['nombre'];
//	$password = $_POST['contraseña'];
//
//	// Hacer una consulta a la base de datos para verificar los datos
//	$resultado = mysqli_query($conn, "SELECT * FROM empleados WHERE nombre = '$username' AND contraseña = '$password'");
//
//	if (mysqli_num_rows($resultado) > 0) {
//		// Si los datos son correctos, iniciar sesión
//		$usuario = mysqli_fetch_assoc($resultado);
//
//		$_SESSION['id_tipo_empleado'] = $usuario;
//
//		// Redirigir al usuario según su tipo de usuario
//		if ($usuario['id_tipo_empleado'] === 1) {
//			header('Location: admin/admin.php');
//		} else {
//			header('Location: medic/medic.php');
//		}
//	} else {
//		// Si los datos son incorrectos, mostrar un mensaje de error
//		echo 'Nombre de usuario o contraseña incorrectos.';
//	}
//}

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
if($filas['id_tipo_empleado']==2){ //cliente
header("location:cliente.php");
}
else{
    ?>
    <?php
    include("index.html");
    ?>
    <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>
