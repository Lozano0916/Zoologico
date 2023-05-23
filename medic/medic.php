<?php 
require ('../includes/conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/medic.css">
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Medico</title>

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
            <a href="#"><span>Inicio</span></a>
          </span>
        </button>
        <button type="button" id="reportes_link">
          <span>
            <i class="fa-solid fa-file-contract" style="color: #ffffff;"></i>
            <span>Reportes</span>
          </span>
        </button>
        <button>
          <span>
            <i class="fa-solid fa-notes-medical" style="color: #ffffff;"></i>
            <a href="funciones/citas/citas_pendientes.php"><span>Citas</span></a>
          </span>
        </button>
        <button type="button" id="menu_des">
          <span>
            <i class="fa-solid fa-server" style="color: #ffffff;"></i>
            <span><select id="menu" class="tablas_menu"><option value="option1">Medicamentos</option>
            <option value="option2">Recintos</option>
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



<div id="option1" class="opciones">
<br><br>
<center><h1>Medicamentos</h1></center>
<hr style="border: none; border-top: 1px solid black;">
<button type="button" data-bs-toggle="modal" data-bs-target="#agregar_medicamentos_med" class="boton">Agregar</button>
<button type="button" data-bs-toggle="modal" data-bs-target="#utilizar_medicamentos" class="boton">Usar</button>
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
<div id="option2" class="opciones" style="display:none;">
<br><br>
<center><h1>Recintos</h1></center>
<hr style="border: none; border-top: 1px solid black;">
<div id="recintos">
	<div class="table">
		<table>
			<thead>
			<tr>
				<td>Id recinto</td>
				<td>Tipo recinto</td>
				<td>Numero animales</td>
				<td>Estado</td>
        		<td>Uso</td>
			</tr>
			</thead>
			<tbody>
				<?php 
				$sql="SELECT * from recintos";
				$result=mysqli_query($conn,$sql);
				while($mostrar=mysqli_fetch_array($result)){

          		$arreglo = $mostrar['id_recintos'].','.$mostrar['tipo'].','.$mostrar['n_animales'].','.$mostrar['estado'];
				 ?>
				<tr>
					<td><?php echo $mostrar['id_recintos'] ?></td>
					<td><?php echo $mostrar['tipo'] ?></td>
					<td><?php echo $mostrar['n_animales'] ?></td>
					<td><?php echo $mostrar['estado'] ?></td>
					<td><button type="button" data-bs-toggle="modal" data-bs-target="#ocupar_recintos_medic" class="boton" onclick="estado_rec('<?php echo $arreglo?>')">Ocupar</td>
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

<!-- Opcion de editar estado y numero animales de los recintos -->
<div class="modal fade" id="ocupar_recintos_medic" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Utilizar recintos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="for_recin_medic">

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Id:</label>
            <input type="text" class="form-control" id="id_recin_medic" name="id_recin_medic" readonly>
          </div>

          <div class="mb-3">
          <label for="n_recin" class="col-form-label">Seleccionar animal:</label>
          <select class="form-control" id="n_recin_medic" name="n_recin_medic">
            <option value=""></option>
            <?php
              // Consultar la lista de alimentos desde la base de datos
              $query = "SELECT id_animales, nombre FROM animales";
              $result = $conn->query($query);

              // Generar las opciones del menú desplegable
              while ($row = $result->fetch_assoc()) {
                $alimentoId = $row['id_animales'];
                $alimentoNombre = $row['nombre'];
                echo "<option value='$alimentoId'>$alimentoNombre</option>";
              }
            ?>
          </select>
        </div>

		    <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Estado:</label>
                <select  class="form-select form-control" id="estado_recin_medic" name="estado_recin_medic">
                    <option value="ocupado">Ocupado</option>
                    <option value="libre">Libre</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="boton" id="ocupar_medic_boton" onclick="estado_recinto_medic()">Aceptar</button>
      </div>
    </div>
  </div>
</div>
<script>
  function estado_recinto_medic() {
    var estadoRecinSelect = document.getElementById("estado_recin");
    var nRecinSelect = document.getElementById("n_recin");

    if (estadoRecinSelect.value === "libre") {
      nRecinSelect.value = "";
    }
  }
</script>


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
<div class="modal fade" id="agregar_medicamentos_med" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<!-- Opcion de citas -->
<div class="modal fade" id="citas_animal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">¿Que desea realiza?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <button type="button" type="button" data-bs-toggle="modal" data-bs-target="#agendar_cita_boton" class="boton">Agendar citas</button>
        <button type="button"  class="boton" id="pendientes_cita_boton">Citas pedientes</button>
      </div>
    </div>
  </div>
</div>

<!-- Agendar cita -->
<div class="modal fade" id="agendar_cita_boton" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Agendar cita</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="funciones/citas/agendar_cita.php" method="POST">
          <br>
          <div class="mb-3">
            <label for="n_recin" class="col-form-label">Seleccionar animal:</label>
            <select class="form-control" id="n_agendar_medic" name="n_agendar_medic">
              <?php
                // Consultar la lista de alimentos desde la base de datos
                $query = "SELECT id_animales, nombre FROM animales";
                $result = $conn->query($query);

                // Generar las opciones del menú desplegable
                while ($row = $result->fetch_assoc()) {
                  $alimentoId = $row['id_animales'];
                  $alimentoNombre = $row['nombre'];
                  echo "<option value='$alimentoId'>$alimentoNombre</option>";
                }
              ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Fecha de cita:</label>
            <input type="date" class="form-control" id="agendar_fecha" name="agendar_fecha">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Razon:</label>
            <textarea class="form-control" id="agendar_raz" name="agendar_raz" cols="30" rows="10"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="boton" id ="btn-agendar" name="submit">Agendar</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
  // Obtener el botón "Agendar" por su id
  var btnAgendar = document.getElementById("btn-agendar");

  // Agregar un evento de clic al botón
  btnAgendar.addEventListener("click", function() {
    // Cerrar el modal
    var modal = document.getElementById("agendar_cita_boton");
    var modalBootstrap = bootstrap.Modal.getInstance(modal);
    modalBootstrap.hide();

    // Mostrar el mensaje de alerta
    alert("La cita ha sido agendada correctamente.");
  });
</script>

<!-- Opcion de editar reducir medicamentos -->
<div class="modal fade" id="utilizar_medicamentos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Utilizar</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="id_medicamento" class="col-form-label">Medicamento:</label>
          <select class="form-control" id="id_medicamento" name="id_medicamento">
            <?php
              // Consultar la lista de alimentos desde la base de datos
              $query = "SELECT id_medicamento, nombre FROM medicamentos";
              $result = $conn->query($query);

              // Generar las opciones del menú desplegable
              while ($row = $result->fetch_assoc()) {
                $medicamentoId = $row['id_medicamento'];
                $medicamentoNombre = $row['nombre'];
                echo "<option value='$medicamentoId'>$medicamentoNombre</option>";
              }
            ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="restar_cantidad" class="col-form-label">Cantidad:</label>
          <input type="number" class="form-control" id="restar_cantidad" name="restar_cantidad" />
        </div>
        <div class="modal-footer">
          <button class="boton" onclick="restarCantidad()">Utilizar</button>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>



<div id="reportes"></div>

<div id="citas"></div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="funciones.js"></script>
<script>
  document.getElementById("menu").addEventListener("change", function() {
    var opcion = this.value;

    var opciones = document.getElementsByClassName("opciones");
    for (var i = 0; i < opciones.length; i++) {
      opciones[i].style.display = "none";
    }

    document.getElementById(opcion).style.display = "block";
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/6e6a67c425.js" crossorigin="anonymous"></script>
</body>
</html>