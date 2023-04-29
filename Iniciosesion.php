<?php

    session_start();
    require_once 'includes/conexion.php';
  if (isset($_POST['nombre']) && isset($_POST['contraseña'])) {
    $nombre = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];

    $consulta = "SELECT * FROM empleados WHERE nombre='$nombre' AND contraseña='$contraseña'";
    $resultado = mysqli_query($conn, $consulta);

    if (mysqli_num_rows($resultado) == 1) {
      $fila = mysqli_fetch_assoc($resultado);
      $_SESSION['id_tipo_empleado'] = $fila['id_tipo_empleado'];

      if ($_SESSION['id_tipo_empleado'] == 1) {
        header('Location: admin.php');
      }else {
        echo 'Usuario o contraseña incorrectos';
      }

    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/iniciosesion.css">
    <link rel="icon" href="img/frailecillo.png"" type="image/x-icon">

    <title>Inicio sesion</title>
    
</head>
<body>
    <a href="index.php"><button class="btn-volver"><i class="fa-solid fa-arrow-left"></i></button></a>
    <center><h1 style="color: #1b492e;">BIENVENIDO</h1></center>
    <div class="container">
        <h1>Iniciar sesión</h1>

        <?php if(!empty($message)) : ?>
            <p><?= $message ?></p>
        <?php endif; ?>
        <form method="POST" action="#">
            <label for="username">Nombre de usuario:</label>
            <input type="text" id="username" name="nombre" required>
    
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="contraseña" required>
            </select>
    
            <button type="submit">Iniciar sesión</button>
        </form>
    </div>
    <script src="https://kit.fontawesome.com/6e6a67c425.js" crossorigin="anonymous"></script>
</body>
</html>