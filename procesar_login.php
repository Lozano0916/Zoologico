<?php
session_start();
require_once('includes/conexion.php');

$nombre = $_POST['nombre'];
$contraseña = $_POST['contraseña'];
$tipo_usuario = $_POST['id_tipo_empleado'];

if ($tipo_usuario == 'administrador') {
	$sql = "SELECT * FROM empleados WHERE nombre='$nombre' AND contraseña='$contraseña'";
	$resultado = $conn->query($sql);

	if ($resultado->num_rows > 0) {
		$_SESSION['nombre'] = $nombre;
		$_SESSION['id_tipo_empleado'] = $tipo_usuario;
		header("Location: admin.php");
	} else {
		header("Location: index.php?error=1");
	}
} else if ($tipo_usuario == 'empleado') {
	$sql = "SELECT * FROM empleados WHERE nombre='$nombre' AND contraseña='$contraseña'";
	$resultado = $conn->query($sql);

	if ($resultado->num_rows > 0) {
		$_SESSION['nombre'] = $usuarionombre;
		$_SESSION['id_tipo_empleado'] = $tipo_usuario;
		header("Location: dashboard_empleado.php");
	} else {
		header("Location: index.php?error=1");
	}
}

$conn->close();
?>
