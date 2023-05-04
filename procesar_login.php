<?php
session_start();

// Conectar a la base de datos
require_once 'includes/conexion.php';

// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	// Obtener los datos del formulario
	$username = $_POST['nombre'];
	$password = $_POST['contraseña'];

	// Hacer una consulta a la base de datos para verificar los datos
	$resultado = mysqli_query($conn, "SELECT * FROM empleados WHERE nombre = '$username' AND contraseña = '$password'");

	if (mysqli_num_rows($resultado) > 0) {
		// Si los datos son correctos, iniciar sesión
		$usuario = mysqli_fetch_assoc($resultado);

		$_SESSION['id_tipo_empleado'] = $usuario;

		// Redirigir al usuario según su tipo de usuario
		if ($usuario['id_tipo_empleado'] === 1) {
			header('Location: admin/admin.php');
		} else {
			header('Location: medic/medic.php');
		}
	} else {
		// Si los datos son incorrectos, mostrar un mensaje de error
		echo 'Nombre de usuario o contraseña incorrectos.';
	}
}
?>

