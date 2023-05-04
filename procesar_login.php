<?php
session_start();

// Conectarse a la base de datos
require_once 'includes/conexion.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Recuperar los datos del formulario
  $nombre = mysqli_real_escape_string($conexion, $_POST["nombre"]);
  $contraseña = mysqli_real_escape_string($conexion, $_POST["contraseña"]);
  $id_tipo_empleado = mysqli_real_escape_string($conexion, $_POST["id_tipo_empleado"]);

  // Consultar la base de datos para verificar los datos del usuario
  $consulta = "SELECT id, nombre, tipo FROM empleados WHERE nombre = '$nombre' AND contraseña = '$contraseña' AND id_tipo_empleado = '$id_tipo_empleado'";
  $resultado = mysqli_query($conexion, $consulta);

  // Si la consulta devuelve un resultado válido, entonces iniciar sesión y redirigir
  if (mysqli_num_rows($resultado) == 1) {
    $fila = mysqli_fetch_assoc($resultado);
    $_SESSION["id"] = $fila["id"];
    $_SESSION["nombre"] = $fila["nombre"];
    $_SESSION["id_tipo_empleado"] = $fila["id_tipo_empleado"];
    header("Location: admin.php");
    exit();
  } else {
    // Mostrar un mensaje de error si la consulta no devuelve un resultado válido
    $error = "Usuario o contraseña incorrectos";
  }
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>


