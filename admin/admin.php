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

    <aside class="sidebar">
      <header class="sidebar-header">
        <img class="logo-img" src="../images/frailecillo.png"/>
      </header>
      <nav>
        <button>
          <span>
            <i class="fa-solid fa-house" style="color: #ffffff;"></i>
            <span>Inicio</span>
          </span>
        </button>
        <button>
          <span>
            <i class="fa-solid fa-money-bill-trend-up" style="color: #ffffff;"></i>
            <span>Ventas</span>
          </span>
        </button>
        <button>
          <span>
            <i class="fa-sharp fa-solid fa-chart-simple" style="color: #ffffff;"></i>
            <a href="#"><span>Estadisticas</span></a>
          </span>
        </button>
        <button>
          <span>
            <i class="fa-light fa-table-tree" style="color: #ffffff;"></i>
            <span><select id="menu" class="tablas_menu"><option value="option1">Tienda</option>
            <option value="option2">Empleados</option>
            <option value="option3">Medicamentos</option>
            <option value="option4">Recintos</option>
            <option value="option5">Animales</option>
            <option value="option6">Alimentos</option>
            </select></span>
          </span>
        </button>
        <button id="logout-button">
          <span>
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Cerrar sesion</span>
          </span>
        </button>
      </nav>
    </aside>

<!-- logout -->    
<script>
  var logoutButton = document.getElementById("logout-button");
  var logoutLink = document.createElement("a");
  logoutLink.href = "../logout.php";
  logoutLink.style.display = "none";
  document.body.appendChild(logoutLink);

  logoutButton.onclick = function() {
    logoutLink.click();
  };
</script>


<!-- tablas -->    
<!-- Tienda -->    
<div id="option1" class="opciones">
  <br><br>
<center><h1>Tienda</h1></center>
<hr style="border: none; border-top: 1px solid black;">
<button type="button" data-bs-toggle="modal" data-bs-target="#agregar" class="boton">Agregar</button>
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
					<td><img src="<?php echo $mostrar['imagen'] ?>"   height=100px ></td>
					<td><button type="button" data-bs-toggle="modal" data-bs-target="#editar" class="boton" onclick="editar('<?php echo $arreglo?>')"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></button></td>
					<td><button type="button" data-bs-toggle="modal" data-bs-target="#eliminar" class="boton" onclick="eliminar('<?php echo $arreglo?>')"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></button></td>
				</tr>
				<?php 
				}
				 ?>
			</tbody>
		</table>
	</div>
  </div>
</div>

<!-- Empleados -->    
<div id="option2" class="opciones" style="display:none;">
<center><h1>Empleados</h1></center>
<hr style="border: none; border-top: 1px solid black;">
<button type="button" data-bs-toggle="modal" data-bs-target="#agregar_empleados" class="boton">Agregar</button>
<div id="empleados">
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

          $arreglo2 = $mostrar['id_empleado'].','.$mostrar['id_tipo_empleado'].','.$mostrar['nombre'].','.$mostrar['email'].','.$mostrar['sexo'].','.$mostrar['numero_telefonico'].','.$mostrar['edad'].','.$mostrar['direccion'];
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
					<td><button type="button" data-bs-toggle="modal" data-bs-target="#editar_empleados" class="boton" onclick="editar_emp('<?php echo $arreglo2?>')"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></button></td>
					<td><button type="button" data-bs-toggle="modal" data-bs-target="#eliminar_empleados" class="boton" onclick="eliminar_emp('<?php echo $arreglo2?>')"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></button></button></td>
				</tr>
				<?php 
				}
				 ?>
			</tbody>
		</table>
	</div>
  </div>
</div>

<!-- Medicamentos -->    
<div id="option3" class="opciones" style="display:none;">
<center><h1>Medicamentos</h1></center>
<hr style="border: none; border-top: 1px solid black;">
<div id="medicamentos">
	<div class="table">
		<table>
			<thead>
			<tr>
				<td>Id</td>
				<td>Nombre</td>
				<td>Laboratorio</td>
				<td>Existencias</td>
				<td>Fecha compra</td>
				<td>Fecha vcto</td>
				<td>Lote</td>
        <td>Agregar</td>
        <td>Eliminar</td>
			</tr>
			</thead>
			<tbody>
				<?php 
				$sql="SELECT * from medicamentos";
				$result=mysqli_query($conn,$sql);
				while($mostrar=mysqli_fetch_array($result)){
				 ?>
				<tr>
					<td><?php echo $mostrar['id_medicamento'] ?></td>
					<td><?php echo $mostrar['nombre'] ?></td>
					<td><?php echo $mostrar['laboratorio'] ?></td>
					<td><?php echo $mostrar['existencias'] ?></td>
          <td><?php echo $mostrar['fecha_vencimiento'] ?></td>
          <td><?php echo $mostrar['fecha_compra'] ?></td>
          <td><?php echo $mostrar['lote'] ?></td>
					<td><button type="button" data-bs-toggle="modal" data-bs-target="#editar" class="boton" onclick="editar('<?php echo $arreglo?>')"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></button></td>
					<td><button type="button" data-bs-toggle="modal" data-bs-target="#eliminar" class="boton" onclick="eliminar('<?php echo $arreglo?>')"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></button></td>
				</tr>
				<?php 
				}
				 ?>
			</tbody>
		</table>
	</div>
  </div>

</div>

<!-- recintos -->    
<div id="option4" class="opciones" style="display:none;">
<center><h1>Recintos</h1></center>
<hr style="border: none; border-top: 1px solid black;">
<button type="button" data-bs-toggle="modal" data-bs-target="#agregar_empleados" class="boton">Agregar</button>
<div id="recintos">
	<div class="table">
		<table>
			<thead>
			<tr>
				<td>Id recinto</td>
				<td>Tipo recinto</td>
				<td>Numero animales</td>
				<td>Estado</td>
        <td>Editar</td>
        <td>Eliminar</td>
			</tr>
			</thead>
			<tbody>
				<?php 
				$sql="SELECT * from recintos";
				$result=mysqli_query($conn,$sql);
				while($mostrar=mysqli_fetch_array($result)){

          //$arreglo2 = $mostrar['id_empleado'].','.$mostrar['id_tipo_empleado'].','.$mostrar['nombre'].','.$mostrar['email'].','.$mostrar['sexo'].','.$mostrar['numero_telefonico'].','.$mostrar['edad'].','.$mostrar['direccion'];
				 ?>
				<tr>
					<td><?php echo $mostrar['id_recintos'] ?></td>
					<td><?php echo $mostrar['id_recinto'] ?></td>
					<td><?php echo $mostrar['n_animales'] ?></td>
					<td><?php echo $mostrar['estado'] ?></td>
					<td><button type="button" data-bs-toggle="modal" data-bs-target="#editar_empleados" class="boton" onclick="editar_rec('')"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></button></td>
					<td><button type="button" data-bs-toggle="modal" data-bs-target="#eliminar_empleados" class="boton"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></button></button></td>
				</tr>
				<?php 
				}
				 ?>
			</tbody>
		</table>
	</div>
  </div>
</div>

<!-- Animales -->    
<div id="option5" class="opciones" style="display:none;">
<center><h1>Animales</h1></center>
<hr style="border: none; border-top: 1px solid black;">
<button type="button" data-bs-toggle="modal" data-bs-target="#agregar_empleados" class="boton">Agregar</button>
<div id="recintos">
	<div class="table">
		<table>
			<thead>
			<tr>
				<td>Id animales</td>
				<td>Nombre</td>
				<td>Especie</td>
				<td>Numero ejemplares</td>
        <td>Editar</td>
        <td>Eliminar</td>
			</tr>
			</thead>
			<tbody>
				<?php 
				$sql="SELECT * from animales";
				$result=mysqli_query($conn,$sql);
				while($mostrar=mysqli_fetch_array($result)){

          //$arreglo2 = $mostrar['id_empleado'].','.$mostrar['id_tipo_empleado'].','.$mostrar['nombre'].','.$mostrar['email'].','.$mostrar['sexo'].','.$mostrar['numero_telefonico'].','.$mostrar['edad'].','.$mostrar['direccion'];
				 ?>
				<tr>
					<td><?php echo $mostrar['id_animales'] ?></td>
					<td><?php echo $mostrar['nombre'] ?></td>
					<td><?php echo $mostrar['especie'] ?></td>
					<td><?php echo $mostrar['numero_ejemplares'] ?></td>
					<td><button type="button" data-bs-toggle="modal" data-bs-target="#editar_empleados" class="boton" onclick="editar_rec('')"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></button></td>
					<td><button type="button" data-bs-toggle="modal" data-bs-target="#eliminar_empleados" class="boton"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></button></button></td>
				</tr>
				<?php 
				}
				 ?>
			</tbody>
		</table>
	</div>
  </div>
</div>


<!-- alimentos -->    
<div id="option6" class="opciones" style="display:none;">
<center><h1>Alimentos</h1></center>
<hr style="border: none; border-top: 1px solid black;">
<button type="button" data-bs-toggle="modal" data-bs-target="#agregar_empleados" class="boton">Agregar</button>
<div id="recintos">
	<div class="table">
		<table>
			<thead>
			<tr>
				<td>Id alimento</td>
				<td>Nombre</td>
				<td>Tipo</td>
				<td>Provedor</td>
        <td>Precio</td>
        <td>Existencias</td>
        <td>Fecha vcto</td>
        <td>Editar</td>
        <td>Eliminar</td>
			</tr>
			</thead>
			<tbody>
				<?php 
				$sql="SELECT * from alimentos";
				$result=mysqli_query($conn,$sql);
				while($mostrar=mysqli_fetch_array($result)){

          //$arreglo2 = $mostrar['id_empleado'].','.$mostrar['id_tipo_empleado'].','.$mostrar['nombre'].','.$mostrar['email'].','.$mostrar['sexo'].','.$mostrar['numero_telefonico'].','.$mostrar['edad'].','.$mostrar['direccion'];
				 ?>
				<tr>
					<td><?php echo $mostrar['id_alimento'] ?></td>
					<td><?php echo $mostrar['nombre'] ?></td>
					<td><?php echo $mostrar['tipo'] ?></td>
					<td><?php echo $mostrar['provedor'] ?></td>
          <td><?php echo $mostrar['precio'] ?></td>
          <td><?php echo $mostrar['existencias'] ?></td>
          <td><?php echo $mostrar['fecha_vencimiento'] ?></td>
					<td><button type="button" data-bs-toggle="modal" data-bs-target="#editar_empleados" class="boton" onclick="editar_rec('')"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></button></td>
					<td><button type="button" data-bs-toggle="modal" data-bs-target="#eliminar_empleados" class="boton"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></button></button></td>
				</tr>
				<?php 
				}
				 ?>
			</tbody>
		</table>
	</div>
  </div>
</div>


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

<!-- EMPLEADOS -->
<!-- Opcion de editar empleado -->
<div class="modal fade" id="editar_empleados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar empleado</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="for_empleados">

          
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Id:</label>
            <input type="text" class="form-control" id="id_empleado" name="id_empleado" readonly>
          </div>
          
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Tipo Empleado:</label>
            <input type="text" class="form-control" id="tipo_empleado" name="tipo_empleado">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre_empleado" name="nombre_empleado">
          </div>

		      <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="text" class="form-control" id="email_empleado" name="email_empleado">
          </div>

		      <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Sexo:</label>
            <input type="text" class="form-control" id="sexo_empleado" name="sexo_empleado">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Numero:</label>
            <input type="text" class="form-control" id="numero_empleado" name="numero_empleado">
          </div>

		      <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Edad:</label>
            <input type="text" class="form-control" id="edad_empleado" name="edad_empleado">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Direccion:</label>
            <input type="text" class="form-control" id="direccion_empleado" name="direccion_empleado">
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="boton" id="editar_empleados_boton">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<!-- Opcion de agregar empleado -->
<div class="modal fade" id="agregar_empleados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar empleado</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="for_empleados_agg">

          
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Tipo Empleado:</label>
            <input type="text" class="form-control" id="tipo_empleado_agg" name="tipo_empleado_agg">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre_empleado_agg" name="nombre_empleado_agg">
          </div>

		      <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="text" class="form-control" id="email_empleado_agg" name="email_empleado_agg">
          </div>

		      <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Sexo:</label>
            <input type="text" class="form-control" id="sexo_empleado_agg" name="sexo_empleado_agg">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Numero:</label>
            <input type="text" class="form-control" id="numero_empleado_agg" name="numero_empleado_agg">
          </div>

		      <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Edad:</label>
            <input type="text" class="form-control" id="edad_empleado_agg" name="edad_empleado_agg">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Direccion:</label>
            <input type="text" class="form-control" id="direccion_empleado_agg" name="direccion_empleado_agg">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Contraseña:</label>
            <input type="text" class="form-control" id="contraseña_empleado_agg" name="contraseña_empleado_agg">
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="boton" id="agregar_empleados_boton">Aceptar</button>
      </div>
    </div>
  </div>
</div>
<!-- Opcion de eliminar tienda-->
<div class="modal fade" id="eliminar_empleados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">¿Estas seguro de eliminar este empleado?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="for_empleados_eli">

          <div class="mb-3">
            <label for="recipient-name" id="id_eli_label"class="col-form-label">Id:</label>
            <input type="text" class="form-control" id="id_eli_emple" name="id_eli_emple" readonly>
          </div>
          <br>
          <div class="mb-3">
            <label for="recipient-name" id="pro_eli_label" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="pro_eli_emple" name="pro_eli_emple" readonly>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button"  class="boton" id="eliminar_empleados_boton">Eliminar</button>
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