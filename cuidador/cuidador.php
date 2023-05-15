<?php
    require ('../includes/conexion.php')
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/cuidador.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Cuidador</title>
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
            <i class="fa-light fa-table" style="color: #ffffff;"></i>
            <span><select id="menu" class="tablas_menu"><option value="option1">Recintos</option>
            <option value="option2">Animales</option>
            <option value="option3">Alimentos</option>
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


<!-- recintos -->    
    <div id="option1" class="opciones">
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

                        $arreglo = $mostrar['id_recintos'].','.$mostrar['n_animales'].','.$mostrar['estado'];
    				 ?>
    				<tr>
    					<td><?php echo $mostrar['id_recintos'] ?></td>
    					<td><?php echo $mostrar['tipo'] ?></td>
    					<td><?php echo $mostrar['n_animales'] ?></td>
    					<td><?php echo $mostrar['estado'] ?></td>
    					<td><button type="button" data-bs-toggle="modal" data-bs-target="#editar_recintos" class="boton" onclick="estado_rec('<?php echo $arreglo?>')">Ocupar</td>
                    
    				</tr>
    				<?php 
    				}
    				 ?>
    			</tbody>
    		</table>
    	</div>
      </div>
    </div> 

<!-- Animales  -->   
<div id="option2" class="opciones" style="display:none;">
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


<!-- alimentos   --> 
<div id="option3" class="opciones" style="display:none;">
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
 
<!-- Opcion de editar estado y numero animales de los recintos -->
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
            <label for="recipient-name" class="col-form-label">Numero Animales:</label>
            <input type="number" class="form-control" id="n_recin" name="n_recin">
          </div>

		    <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Estado:</label>
                <select  class="form-select form-control" id="estado_recin" name="estado_recin">
                    <option value="ocupado">Ocupado</option>
                    <option value="libre">Libre</option>
            </select>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="boton" id="ocupar_recin_boton">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="funciones.js"></script>

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/6e6a67c425.js" crossorigin="anonymous"></script>
</body>
</html>
