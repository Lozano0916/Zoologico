<?php
// Realiza la conexión a la base de datos y ejecuta la consulta
    include('../../includes/conexion.php');
    $query = "SELECT * FROM reportes";
    $result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
</head>
<body>
    <br>
    <h1>Bandeja de Entrada de Informes</h1>

    <?php
    // Verifica si hay informes en la base de datos
    echo "<div class='card-container-informe'>";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $idInforme = $row['id'];
            $empleadoCuidador = $row['empleado'];
            $animalInforme = $row['animal'];
            $fechaInforme = $row['fecha'];
            $contenidoInforme = $row['contenido'];
          ?>  
            <div class="card">
                <div class="card-body">
                <blockquote class="blockquote mb-0 informe-content">
                  <?php 
                        echo "$idInforme &emsp;&emsp;&emsp;";
                        echo "<strong>Empleado:</strong> $empleadoCuidador&nbsp";
                        echo "<strong>Animal:</strong> $animalInforme&nbsp";
                        echo "<strong>Fecha:</strong> $fechaInforme&nbsp";
                        echo "<strong>Contenido:</strong>$contenidoInforme"; ?>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#" class="boton1"><i class="fa-duotone fa-circle-ellipsis" style="--fa-primary-color: #1b492e; --fa-secondary-color: #ffffff;"></i></button>
                </blockquote>
                </div>  
            </div>
        <?php
        }
        echo "</div>";
    } else {
        echo "<p>No hay informes en la bandeja de entrada.</p>";
    }

    // Cierra la conexión a la base de datos
    $conn->close();
    ?>

<style>
h1{
    margin-left:412px;
}
.card-container-informe{
    margin-left:300px;
}
.informe-content {
    font-size: 14px;
}
.card:hover{
    background: #FFF8DE;
}
.boton1{
    border: none;
    background: transparent;
}
</style>

<script src="https://kit.fontawesome.com/6e6a67c425.js" crossorigin="anonymous"></script>
</body>
</html>