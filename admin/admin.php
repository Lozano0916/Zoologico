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
    <title>Administrador</title>
	<script src="jquery-3.6.4.min.js"></script>
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
  <button class="boton" onclick="mostrarModal()">Agregar producto</button>
  <form action="busqueda.php" method="get" class="search-form">
	<input class="buscar"type="text" name="query" placeholder="Buscar...">
	<button class="boton" type="submit">Buscar</button>
	</form>
	<div class="container">
		<table>
			<thead>
			<tr>
				<td>Id</td>
				<td>Nombre</td>
				<td>Descripcion</td>
				<td>Precio</td>
				<td>imagen</td>
				<td>Editar</td>
				<td>Elminiar</td>
			</tr>
			</thead>
			<tbody>
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
					<td><img src="<?php echo $mostrar['imagen'] ?>"   height=120px ></td>
					<td><button class="boton" onclick="mostrarModal1();editar('<?php $result?>')">Editar</button></td>
					<td><button class="boton">Eliminar</button></td>
				</tr>
				<?php 
				}
				 ?>
			</tbody>
		</table>
	</div>

</center>





<div id="agregar" class="modal">
  <div class="modal-content">
    <span class="close" onclick="cerrarModal()">&times;</span>
    <h2>Agregar elemento</h2>
    <form>
      <label>Nombre:</label>
      <input type="text" name="nombre">

      <label>Descripción:</label>
      <input name="descripcion"></input>

	  <label>Precio:</label>
      <input name="precio"></input>

      <button class="boton" type="button" onclick="agregarElemento()">Agregar</button>
    </form>
  </div>
</div>

<div id="editar" class="modal">
  <div class="modal-content">
    <span class="close" onclick="cerrarModal1()">&times;</span>
    <h2>Editar producto</h2>
    <form>
      <label>Nombre:</label>
      <input type="text" name="nombre">

      <label>Descripción:</label>
      <input name="descripcion"></input>

	  <label>Precio:</label>
      <input name="precio"></input>

      <button class="boton" type="button" onclick="editarProducto()">Editar</button>
    </form>
  </div>
</div>

<script>
function mostrarModal() {
  document.getElementById("agregar").style.display = "block";
}

function cerrarModal() {
  document.getElementById("agregar").style.display = "none";
}
function mostrarModal1() {
  document.getElementById("editar").style.display = "block";
}

function cerrarModal1() {
  document.getElementById("editar").style.display = "none";
}
</script>




<script src="funciones.js"></script>
</body>
</html>