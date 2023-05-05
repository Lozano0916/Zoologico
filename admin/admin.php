<?php
require ('../includes/conexion.php')
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/admin.css">
    <title>Document</title>
</head>
<body>
    <div class="sidebar">
      <a href="../index.php" class="navbar-brand"> <img src="../img/frailecillo.png" height="80px"> </a>
  <ul>
    <li><a href="#">Inicio</a></li>
    <li><a href="#">Tienda</a></li>
    <li><a href="#">Contacto</a></li>
    <li><a href="../logout.php">Cerrar sesion <i class="fa-solid fa-right-from-bracket"></i></a></li>
  </ul>
</div>

<center>
  <h1>Tienda</h1>
  <button class="btn-tienda">Agregar produtos</button>
  <button class="btn-tienda">Eliminar produtos</button>
  <button class="btn-tienda">Editar produtos</button>
	<table border="1" >
		<tr>
			<td>Id</td>
			<td>Nombre</td>
			<td>Descripcio</td>
			<td>Precio</td>
			<td>imagen</td>	
		</tr>

		<?php 
		$sql="SELECT * from productos";
		$result=mysqli_query($conn,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr>
			<td><?php echo $mostrar['id_producto'] ?></td>
			<td><?php echo $mostrar['nombre'] ?></td>
			<td><?php echo $mostrar['descripcion'] ?></td>
			<td><?php echo $mostrar['precio'] ?></td>
			<td><?php echo $mostrar['imagen'] ?></td>
		</tr>
	<?php 
	}
	 ?>
	</table>
</center>

<script src="https://kit.fontawesome.com/6e6a67c425.js" crossorigin="anonymous"></script>
</body>
</html>