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
    <link rel="icon" href="../images/frailecillo.png"" type=" image/x-icon">
    <title>Administrador</title>
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>

    <aside class="sidebar">
      <header class="sidebar-header">
        <img class="logo-img" src="../images/frailecillo.png"/>
      </header>
      <nav>
        <button type="button" id="reportes_link">
          <span>
            <i class="fa-solid fa-file-contract" style="color: #ffffff;"></i>
            <span>Reportes</span>
          </span>
        </button>
        <button type="button" id="menu_des">
          <span>
            <i class="fa-solid fa-server" style="color: #ffffff;"></i>
            <span><select id="menu" class="tablas_menu"><option value="option1">Tienda</option>
            <option value="option2">Empleados</option>
            <option value="option3">Medicamentos</option>
            <option value="option4">Recintos</option>
            <option value="option5">Animales</option>
            <option value="option6">Alimentos</option>
            </select></span>
          </span>
        </button>
        <button>
          <span>
            <i class="fa-solid fa-right-from-bracket"></i>
            <a href="../logout.php"><span>Cerrar sesion</span></a>
          </span>
        </button>
      </nav>
    </aside>

<!-- barra de busqueda -->

 
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
        <td>cantidad</td>	
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

					$arreglo = $mostrar['id_producto'].','.$mostrar['nombre'].','.$mostrar['descripcion'].','.$mostrar['precio'].','.$mostrar['imagen'].','.$mostrar['cantidad'];
				 ?>
				<tr>
					<td><?php echo $mostrar['id_producto'] ?></td>
					<td><?php echo $mostrar['nombre'] ?></td>
					<td><?php echo $mostrar['descripcion'] ?></td>
					<td><?php echo $mostrar['precio'] ?></td>
          <td><?php echo $mostrar['cantidad'] ?></td>
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
<br><br>
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
<br><br>
<center><h1>Medicamentos</h1></center>
<hr style="border: none; border-top: 1px solid black;">
<button type="button" data-bs-toggle="modal" data-bs-target="#agregar_medicamentos" class="boton">Agregar</button>
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
          $arreglo3 = $mostrar['id_medicamento'].','.$mostrar['nombre'].','.$mostrar['laboratorio'].','.$mostrar['existencias'].','.$mostrar['fecha_vencimiento'].','.$mostrar['fecha_compra'].','.$mostrar['lote'];
				 ?>
				<tr>
					<td><?php echo $mostrar['id_medicamento'] ?></td>
					<td><?php echo $mostrar['nombre'] ?></td>
					<td><?php echo $mostrar['laboratorio'] ?></td>
					<td><?php echo $mostrar['existencias'] ?></td>
          <td><?php echo $mostrar['fecha_vencimiento'] ?></td>
          <td><?php echo $mostrar['fecha_compra'] ?></td>
          <td><?php echo $mostrar['lote'] ?></td>
					<td><button type="button" data-bs-toggle="modal" data-bs-target="#editar_med" class="boton" onclick="editar_med('<?php echo $arreglo3?>')"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></button></td>
					<td><button type="button" data-bs-toggle="modal" data-bs-target="#eliminar_med" class="boton" onclick="eliminar_med('<?php echo $arreglo3?>')"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></button></td>
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
<br><br>
<center><h1>Recintos</h1></center>
<hr style="border: none; border-top: 1px solid black;">
<button type="button" data-bs-toggle="modal" data-bs-target="#agregar_recinto" class="boton">Agregar</button>
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

          $arreglo4 = $mostrar['id_recintos'].','.$mostrar['tipo'].','.$mostrar['n_animales'].','.$mostrar['estado'];
				 ?>
				<tr>
					<td><?php echo $mostrar['id_recintos'] ?></td>
					<td><?php echo $mostrar['tipo'] ?></td>
					<td><?php echo $mostrar['n_animales'] ?></td>
					<td><?php echo $mostrar['estado'] ?></td>
					<td><button type="button" data-bs-toggle="modal" data-bs-target="#editar_recintos" class="boton" onclick="editar_rec('<?php echo $arreglo4?>')"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></button></td>
					<td><button type="button" data-bs-toggle="modal" data-bs-target="#eliminar_recintos" class="boton" onclick="eliminar_rec('<?php echo $arreglo4?>')"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></button></td>
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
<br><br>
<center><h1>Animales</h1></center>
<hr style="border: none; border-top: 1px solid black;">
<button type="button" data-bs-toggle="modal" data-bs-target="#agregar_animales" class="boton">Agregar</button>
<div id="animales">
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

          $arreglo5 = $mostrar['id_animales'].','.$mostrar['nombre'].','.$mostrar['especie'].','.$mostrar['numero_ejemplares'];
				 ?>
				<tr>
					<td><?php echo $mostrar['id_animales'] ?></td>
					<td><?php echo $mostrar['nombre'] ?></td>
					<td><?php echo $mostrar['especie'] ?></td>
					<td><?php echo $mostrar['numero_ejemplares'] ?></td>
					<td><button type="button" data-bs-toggle="modal" data-bs-target="#editar_animales" class="boton" onclick="editar_ani('<?php echo $arreglo5?>')"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></button></td>
					<td><button type="button" data-bs-toggle="modal" data-bs-target="#eliminar_animales" class="boton"onclick="eliminar_ani('<?php echo $arreglo5?>')"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></button></button></td>
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
<br><br>
<center><h1>Alimentos</h1></center>
<hr style="border: none; border-top: 1px solid black;">
<button type="button" data-bs-toggle="modal" data-bs-target="#agregar_alimentos" class="boton">Agregar</button>
<div id="alimentos">
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

          $arreglo6 = $mostrar['id_alimento'].','.$mostrar['nombre'].','.$mostrar['tipo'].','.$mostrar['provedor'].','.$mostrar['precio'].','.$mostrar['existencias'].','.$mostrar['fecha_vencimiento'];
				 ?>
				<tr>
					<td><?php echo $mostrar['id_alimento'] ?></td>
					<td><?php echo $mostrar['nombre'] ?></td>
					<td><?php echo $mostrar['tipo'] ?></td>
					<td><?php echo $mostrar['provedor'] ?></td>
          <td><?php echo $mostrar['precio'] ?></td>
          <td><?php echo $mostrar['existencias'] ?></td>
          <td><?php echo $mostrar['fecha_vencimiento'] ?></td>
					<td><button type="button" data-bs-toggle="modal" data-bs-target="#editar_alimentos" class="boton" onclick="editar_ali('<?php echo $arreglo6?>')"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></button></td>
					<td><button type="button" data-bs-toggle="modal" data-bs-target="#eliminar_alimentos" class="boton" onclick="editar_ali('<?php echo $arreglo6?>')"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></button></button></td>
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
            <input type="number" class="form-control" id="precio_" name="precio_">
          </div>

		    <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Imagen:</label>
            <input type="text" class="form-control" id="imagen_" name="imagen_">
          </div>

            <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Cantiadad:</label>
            <input type="number" class="form-control" id="cantidad_" name="cantidad_">
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
            <input type="number" class="form-control" id="precio_gg" name="precio_gg">
          </div>

		  <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Imagen:</label>
            <input type="text" class="form-control" id="imagen_gg" name="imagen_gg">
          </div>

          
		  <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Cantidad:</label>
            <input type="number" class="form-control" id="cantidad_gg" name="cantidad_gg">
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
            <select class="form-select form-control" name="tipo_empleado" id="tipo_empleado">
              <option value="1">1.Administrador</option>
              <option value="2">2.Medico</option>
              <option value="3">3.Cuidador</option>
            </select>
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="for_empleados_agg">

          
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Tipo Empleado:</label>
            <select class="form-select form-control" name="tipo_empleado_agg" id="tipo_empleado_agg">
              <option value="1">1.Administrador</option>
              <option value="2">2.Medico</option>
              <option value="3">3.Cuidador</option>
            </select>
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

<!-- MEDICAMENTOS -->
<!-- Opcion de editar medicamentos -->
<div class="modal fade" id="editar_med" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar medicamentos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="for_med_edit">

          
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Id:</label>
            <input type="text" class="form-control" id="id_medic" name="id_medic" readonly>
          </div>
          
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre_medicamento" name="nombre_medicamento">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Laboratorio:</label>
            <input type="text" class="form-control" id="laboratorio_" name="laboratorio_">
          </div>


		      <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Existencias:</label>
            <input type="text" class="form-control" id="existencias_med" name="existencias_med">
          </div>

		      <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Fecha de vencimiento:</label>
            <input type="date" class="form-control" id="fecha_vencimi" name="fecha_vencimi">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Fecha de compra:</label>
            <input type="date" class="form-control" id="fecha_compr" name="fecha_compr">
          </div>

		      <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Lote:</label>
            <input type="text" class="form-control" id="lote_med" name="lote_med">
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="boton" id="editar_medica_boton">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<!-- Opcion de agregar medicamentos -->
<div class="modal fade" id="agregar_medicamentos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar medicamentos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="for_medic_agg">


          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre_medic_agg" name="nombre_medic_agg">
          </div>

		      <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Laboratorio:</label>
            <input type="text" class="form-control" id="laboratorio_medic_agg" name="laboratorio_medic_agg">
          </div>

		      <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Existencias:</label>
            <input type="text" class="form-control" id="existencias_medic_agg" name="existencias_medic_agg">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Fecha de vencimiento:</label>
            <input type="date" class="form-control" id="fecha_vencimi_agg" name="fecha_vencimi_agg">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Fecha de compra:</label>
            <input type="date" class="form-control" id="fecha_compr_agg" name="fecha_compr_agg">
          </div>

		      <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Lote:</label>
            <input type="text" class="form-control" id="lote_med_agg" name="lote_med_agg">
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="boton" id="agregar_medic_boton">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<!-- Opcion de eliminar medicamentos -->
<div class="modal fade" id="eliminar_med" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">¿Estas seguro de eliminar este empleado?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="for_medica_eli">

          <div class="mb-3">
            <label for="recipient-name" id="id_eli_label"class="col-form-label">Id:</label>
            <input type="text" class="form-control" id="id_eli_medic" name="id_eli_medic" readonly>
          </div>
          <br>
          <div class="mb-3">
            <label for="recipient-name" id="pro_eli_label" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="eli_medica" name="eli_medica" readonly>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button"  class="boton" id="eliminar_medica_boton">Eliminar</button>
      </div>
    </div>
  </div>
</div>

<!-- RECINTOS -->
<!-- Opcion de editar recintos -->
<div class="modal fade" id="editar_recintos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Recintos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="for_recin_edit">

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Id:</label>
            <input type="text" class="form-control" id="id_recin" name="id_recin" readonly>
          </div>
          
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Tipo recintos:</label>
            <select class="form-select form-control" name="tipo_recin" id="tipo_recin">
              <option value="1">1.Jaula</option>
              <option value="2">2.Veterinaria</option>
              <option value="3">3.Cuarto de baño</option>
              <option value="4">4.Farmacia</option>
              <option value="5">5.Deposito</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Numero recintos:</label>
            <input type="text" class="form-control" id="n_recin" name="n_recin">
          </div>

		      <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Estado:</label>
            <input type="text" class="form-control" id="estado_recin" name="estado_recin">
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="boton" id="editar_recin_boton">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<!-- Opcion de agregar recintos -->
<div class="modal fade" id="agregar_recinto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Recintos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="for_recin_agg">
          
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Tipo recintos:</label>
            <select class="form-select form-control" name="tipo_recin_agg" id="tipo_recin_agg">
              <option value="1">1.Jaula</option>
              <option value="2">2.Veterinaria</option>
              <option value="3">3.Cuarto de baño</option>
              <option value="4">4.Farmacia</option>
              <option value="5">5.Deposito</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Numero animales:</label>
            <input type="text" class="form-control" id="n_recin_agg" name="n_recin_agg">
          </div>

		      <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Estado:</label>
            <input type="text" class="form-control" id="estado_recin_agg" name="estado_recin_agg">
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="boton" id="agregar_recin_boton">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<!-- Opcion de eliminar recinto -->
<div class="modal fade" id="eliminar_recintos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">¿Estas seguro de eliminar este recinto?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="for_recinto_eli">

          <div class="mb-3">
            <label for="recipient-name" id="id_eli_label"class="col-form-label">Id:</label>
            <input type="text" class="form-control" id="id_eli_recin" name="id_eli_recin" readonly>
          </div>
          <br>
          <div class="mb-3">
            <label for="recipient-name" id="pro_eli_label" class="col-form-label">Estado:</label>
            <input type="text" class="form-control" id="eli_estado" name="eli_estado" readonly>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button"  class="boton" id="eliminar_recinto_boton">Eliminar</button>
      </div>
    </div>
  </div>
</div>

<!-- ANIMALES -->
<!-- Opcion de editar animales -->
<div class="modal fade" id="editar_animales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Animales</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="for_anim_edit">

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Id:</label>
            <input type="text" class="form-control" id="id_anim" name="id_anim" readonly>
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre_anim" name="nombre_anim">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Especie:</label>
            <input type="text" class="form-control" id="especie_anim" name="especie_anim">
          </div>

		      <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Numero de ejemplares:</label>
            <input type="number" class="form-control" id="n_ejemplares" name="n_ejemplares">
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="boton" id="editar_anim_boton">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<!-- Opcion de agregar animales -->
<div class="modal fade" id="agregar_animales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Animales</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="for_anim_agg">

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre_anim_agg" name="nombre_anim_agg">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Especie:</label>
            <input type="text" class="form-control" id="especie_anim_agg" name="especie_anim_agg">
          </div>

		      <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Numero de ejemplares:</label>
            <input type="number" class="form-control" id="n_ejemplares_agg" name="n_ejemplares_agg">
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="boton" id="agregar_anim_boton">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<!-- Opcion de eliminar animal -->
<div class="modal fade" id="eliminar_animales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">¿Estas seguro de eliminar este animal?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="for_anim_eli">

          <div class="mb-3">
            <label for="recipient-name" id="id_eli_label"class="col-form-label">Id:</label>
            <input type="text" class="form-control" id="id_eli_anim" name="id_eli_anim" readonly>
          </div>
          <br>
          <div class="mb-3">
            <label for="recipient-name" id="pro_eli_label" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="eli_nombre_anim" name="eli_nombre_anim" readonly>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button"  class="boton" id="eliminar_animal_boton">Eliminar</button>
      </div>
    </div>
  </div>
</div>

<!-- ALIMENTOS -->
<!-- Opcion de editar alimentos -->
<div class="modal fade" id="editar_alimentos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar alimentos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="for_alim_edit">

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Id:</label>
            <input type="text" class="form-control" id="id_alim" name="id_alim" readonly>
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre_alim" name="nombre_alim">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Tipo:</label>
            <input type="text" class="form-control" id="tipo_alim" name="tipo_alim">
          </div>

		      <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Provedor:</label>
            <input type="text" class="form-control" id="provedor_alim" name="provedor_alim">
          </div>

          
		      <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Precio:</label>
            <input type="number" class="form-control" id="precio_alim" name="precio_alim">
          </div>

          
		      <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Existencias:</label>
            <input type="number" class="form-control" id="existen_alim" name="existen_alim">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Fecha de vencimiento:</label>
            <input type="date" class="form-control" id="fecha_alim" name="fecha_alim">
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="boton" id="editar_alim_boton">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<!-- Opcion de agregar alimentos -->
<div class="modal fade" id="agregar_alimentos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar alimentos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="for_alim_agg">

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre_alim_agg" name="nombre_alim_agg">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Tipo:</label>
            <input type="text" class="form-control" id="tipo_alim_agg" name="tipo_alim_agg">
          </div>

		      <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Provedor:</label>
            <input type="text" class="form-control" id="provedor_alim_agg" name="provedor_alim_agg">
          </div>

		      <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Precio:</label>
            <input type="number" class="form-control" id="precio_alim_agg" name="precio_alim_agg">
          </div>

		      <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Existencias:</label>
            <input type="number" class="form-control" id="existen_alim_agg" name="existen_alim_agg">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Fecha de vencimiento:</label>
            <input type="date" class="form-control" id="fecha_alim_agg" name="fecha_alim_agg">
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="boton" id="agregar_alim_boton">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<!-- Opcion de eliminar alimentos -->
<div class="modal fade" id="eliminar_alimentos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">¿Estas seguro de eliminar este alimento?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="for_alim_eli">

          <div class="mb-3">
            <label for="recipient-name" id="id_eli_label"class="col-form-label">Id:</label>
            <input type="text" class="form-control" id="id_eli_alim" name="id_eli_alim" readonly>
          </div>
          <br>
          <div class="mb-3">
            <label for="recipient-name" id="pro_eli_label" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="eli_nombre_alim" name="eli_nombre_alim" readonly>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button"  class="boton" id="eliminar_alimento_boton">Eliminar</button>
      </div>
    </div>
  </div>
</div>



<div id="reportes"></div>



<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="funciones.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/6e6a67c425.js" crossorigin="anonymous"></script>
</body>
</html>