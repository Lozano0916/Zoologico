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
        <button type="button" id="estadisticas_link">
          <span>
            <i class="fa-sharp fa-solid fa-chart-simple" style="color: #ffffff;"></i>
            <span>Estadisticas</span>
          </span>
        </button>
        <button type="button" id="menu_des">
          <span>
            <i class="fa-solid fa-server" style="color: #ffffff;"></i>
            <span><select id="menu" class="tablas_menu"><option value="option1">Medicamentos</option>
            <option value="option2">Recintos</option>
            <option value="option3">Animales</option>
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

<div id="option1" class="opciones" style="display:none;">
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
<div id="option2" class="opciones" style="display:none;">
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
<div id="option3" class="opciones" style="display:none;">
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





<script src="https://kit.fontawesome.com/6e6a67c425.js" crossorigin="anonymous"></script>
</body>
</html>