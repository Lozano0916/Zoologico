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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
	<div class="table " id="tienda">
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

					$arreglo = $mostrar['nombre'].','.$mostrar['descripcion'].','.$mostrar['precio'].','.$mostrar['imagen'];
				 ?>
				<tr>
					<td><?php echo $mostrar['id_producto'] ?></td>
					<td><?php echo $mostrar['nombre'] ?></td>
					<td><?php echo $mostrar['descripcion'] ?></td>
					<td><?php echo $mostrar['precio'] ?></td>
					<td><img src="<?php echo $mostrar['imagen'] ?>"   height=120px ></td>
					<td><button type="button" data-bs-toggle="modal" data-bs-target="#editar" class="boton" onclick="editar('<?php echo $arreglo?>')">Editar</button></td>
					<td><button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal1" class="boton">Eliminar</button></td>
				</tr>
				<?php 
				}
				 ?>
			</tbody>
		</table>
	</div>

</center>



<!-- Opcion de editar -->
<div class="modal fade" id="editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="for_tienda">

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre_" name="nombre_">
          </div>

		  <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Descripcion:</label>
            <input type="text" class="form-control" id="descripcion_" name="descripcion_">
          </div>

		  <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Precio:</label>
            <input type="text" class="form-control" id="precio_" name="precio_">
          </div>

		  <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Imagen:</label>
            <input type="text" class="form-control" id="imagen_" name="imagen_">
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="boton" id="editar_tienda">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<!-- Opcion de eliminar -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>


<script src="funciones.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


<script src="https://kit.fontawesome.com/6e6a67c425.js" crossorigin="anonymous"></script>
</body>
</html>