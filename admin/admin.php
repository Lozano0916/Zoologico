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
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="sidebar">
      <a href="../index.php" class="navbar-brand"> <img src="../images/frailecillo.png" height="80px"> </a>
	  <ul>
	    <li><a href="#">Inicio</a></li>
	    <li><a href="#">Ventas</a></li>
	    <li><a href="#">Estadisticas</a></li>
	    <li><a href="../logout.php">Cerrar sesion <i class="fa-solid fa-right-from-bracket"></i></a></li>
	  </ul>
	</div>

<center>
  <form action="busqueda.php" method="get" class="search-form">
	<input class="buscar"type="text" name="query" placeholder="Buscar...">
	<button class="boton" type="submit">Buscar</button>
	</form><br>
  <select id="menu">
  <option value="option1">Tienda</option>
  <option value="option2">Empleados</option>
  <option value="option3">Recintos</option>
  <option value="option3">Medicamentos</option>
  <option value="option3">Animales</option>
  <option value="option3">Alimentos</option>
</select>
<button type="button" data-bs-toggle="modal" data-bs-target="#agregar" class="boton">Agregar</button>
<div id="option1" class="opciones">
<h1>Tienda</h1>
<div id="tienda">
	<div class="table">
		<table>
			<thead>
			<tr>
				<td>Id</td>
				<td>Nombre</td>
				<td>Descripcion</td>
				<td>Precio</td>
				<td>imagen</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
			</thead>
			<tbody>
				<?php 
				$sql="SELECT * from productos";
				$result=mysqli_query($conn,$sql);
				while($mostrar=mysqli_fetch_array($result)){

					$arreglo = $mostrar['id_producto'].','.$mostrar['nombre'].','.$mostrar['descripcion'].','.$mostrar['precio'].','.$mostrar['imagen'];
				 ?>
				<tr>
					<td><?php echo $mostrar['id_producto'] ?></td>
					<td><?php echo $mostrar['nombre'] ?></td>
					<td><?php echo $mostrar['descripcion'] ?></td>
					<td><?php echo $mostrar['precio'] ?></td>
					<td><img src="<?php echo $mostrar['imagen'] ?>"   height=120px ></td>
					<td><button type="button" data-bs-toggle="modal" data-bs-target="#editar" class="boton" onclick="editar('<?php echo $arreglo?>')">Editar</button></td>
					<td><button type="button" data-bs-toggle="modal" data-bs-target="#eliminar" class="boton" onclick="eliminar('<?php echo $arreglo?>')">Eliminar</button></td>
				</tr>
				<?php 
				}
				 ?>
			</tbody>
		</table>
	</div>
  </div>
</div>
<div id="option2" class="opciones" style="display:none;">
<h1>Empleados</h1>
<div>
	<div class="table">
		<table>
			<thead>
			<tr>
				<td>Id empleado</td>
				<td>Tipo empleado</td>
				<td>Nombre</td>
				<td>Email</td>
				<td>Sexo</td>
				<td>Numero</td>
				<td>Edad</td>
        <td>Direccion</td>
        <td>Editar</td>
        <td>Eliminar</td>
			</tr>
			</thead>
			<tbody>
				<?php 
				$sql="SELECT * from empleados";
				$result=mysqli_query($conn,$sql);
				while($mostrar=mysqli_fetch_array($result)){
				 ?>
				<tr>
					<td><?php echo $mostrar['id_empleado'] ?></td>
					<td><?php echo $mostrar['id_tipo_empleado'] ?></td>
					<td><?php echo $mostrar['nombre'] ?></td>
					<td><?php echo $mostrar['email'] ?></td>
					<td><?php echo $mostrar['sexo'] ?></td>
          <td><?php echo $mostrar['numero_telefonico'] ?></td>
          <td><?php echo $mostrar['edad'] ?></td>
          <td><?php echo $mostrar['direccion'] ?></td>
					<td><button type="button" data-bs-toggle="modal" data-bs-target="#editar" class="boton" onclick="editar('<?php echo $arreglo?>')">Editar</button></td>
					<td><button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal1" class="boton">Eliminar</button></td>
				</tr>
				<?php 
				}
				 ?>
			</tbody>
		</table>
	</div>
  </div>
</div>

<div id="option3" class="opciones" style="display:none;">Contenido de la opción 3</div>

<script>
  // Agregar un evento change al elemento select
  document.getElementById("menu").addEventListener("change", function() {
    // Obtener el valor de la opción seleccionada
    var opcion = this.value;

    // Ocultar todas las opciones
    var opciones = document.getElementsByClassName("opciones");
    for (var i = 0; i < opciones.length; i++) {
      opciones[i].style.display = "none";
    }

    // Mostrar la opción seleccionada
    document.getElementById(opcion).style.display = "block";
  });
</script>
</center>
  



<!-- Opcion de editar tienda -->
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
            <label for="recipient-name" class="col-form-label">Id:</label>
            <input type="text" class="form-control" id="id_" name="id_" readonly>
          </div>
           
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
        <button type="button" class="boton" id="editar_tienda">Aceptar</button>
      </div>
    </div>
  </div>
</div>


<!-- Opcion de agregar tienda-->
<div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="for_tienda_agg">

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre_gg" name="nombre_gg">
          </div>

		  <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Descripcion:</label>
            <input type="text" class="form-control" id="descripcion_gg" name="descripcion_gg">
          </div>

		  <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Precio:</label>
            <input type="text" class="form-control" id="precio_gg" name="precio_gg">
          </div>

		  <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Imagen:</label>
            <input type="text" class="form-control" id="imagen_gg" name="imagen_gg">
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="boton" id="agregar_tienda">Aceptar</button>
      </div>
    </div>
  </div>
</div>


<!-- Opcion de eliminar tienda-->
<div class="modal fade" id="eliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">¿Estas seguro de eliminar este producto?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="for_tienda_eli">

          <div class="mb-3">
            <label for="recipient-name" id="id_eli_label"class="col-form-label">Id:</label>
            <input type="text" class="form-control" id="id_eli" name="id_eli" readonly>
          </div>
          <br>
          <div class="mb-3">
            <label for="recipient-name" id="pro_eli_label" class="col-form-label">Producto:</label>
            <input type="text" class="form-control" id="pro_eli" name="pro_eli" readonly>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button"  class="boton" id="eliminar_tienda">Eliminar</button>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="funciones.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


<script src="https://kit.fontawesome.com/6e6a67c425.js" crossorigin="anonymous"></script>
</body>
</html>