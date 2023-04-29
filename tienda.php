<?php
// Incluir el archivo de conexión
require_once('includes/conexion.php');

// Hacer una consulta
$sql = "SELECT * FROM productos";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Productos</title>
  <link rel="stylesheet" type="text/css" href="CSS/tienda.css">
</head>
<body>
    <nav>
        <div class="logo">
            <a href="index.php"><img src="img/frailecillo.png"></a>
        </div>
        <div class="menu">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="">Animales</a></li>
                <li><a href="#">Acerca de</a></li>
                <li><a href="#">Directorio</a></li>
            </ul>
        </div>
    </nav>
  <div class="contenedor">
    <?php if ($resultado->num_rows > 0): ?>
      <?php while($row = $resultado->fetch_assoc()): ?>
        <div class="tarjeta">
          <img src="<?php echo $row['imagen']; ?>">
          <h2><?php echo $row['nombre']; ?></h2>
          <p><?php echo $row['descripcion']; ?></p>
          <span class="precio">$<?php echo $row['precio']; ?></span>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p>No se encontraron productos</p>
    <?php endif; ?>
  </div>
</body>
</html>

<?php
// Cerrar la conexión
$conn->close();
?>
