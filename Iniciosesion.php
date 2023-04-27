<?php
    include_once 'conexion.php';

session_start();

if (isset($_POST['nombre']) && isset($_POST['contrasena'])) {
  $usuario = mysqli_real_escape_string($conn, $_POST['nombre']);
  $contrasena = mysqli_real_escape_string($conn, $_POST['contrasenia']);

  $query = "SELECT * FROM zoologico WHERE empleados='$nombre' AND contrasenia='$contrasena'";
  $resultado = mysqli_query($conn, $query);

  if (mysqli_num_rows($resultado) == 1) {
    $fila = mysqli_fetch_assoc($resultado);
    $_SESSION['nombre'] = $fila['nombre'];
    $_SESSION['id tipo empleado'] = $fila['id tipo empleado'];
    header('Location: inicio.html');
  } else {
    $error = "Nombre de usuario o contraseña incorrectos";
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
    <a href="index.html"><button class="btn-volver"><i class="fa-solid fa-arrow-left"></i></button></a>
    <center><h1 style="color: #1b492e;">BIENVENIDO</h1></center>
    <div class="container">
        <h1>Iniciar sesión</h1>
        <form>
            <label for="username">Nombre de usuario:</label>
            <input type="text" id="username" name="nombre" required>
    
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="contrasenia" required>
    
            <label for="usertype">Tipo de usuario:</label>
            <select id="usertype" name="usertype">
                <option value="admin">Administrador</option>
                <option value="medic">Medico</option>
                <option value="cuida">Cuidador</option>
            </select>
    
            <button type="submit">Iniciar sesión</button>
        </form>
    </div>
    <script src="https://kit.fontawesome.com/6e6a67c425.js" crossorigin="anonymous"></script>
</body>
</html>