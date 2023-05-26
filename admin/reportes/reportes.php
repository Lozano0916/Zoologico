<?php
// Realiza la conexión a la base de datos y ejecuta la consulta
    include('../../includes/conexion.php');
    $query = "SELECT * FROM reportes_admin";
    $result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../images/frailecillo.png"" type=" image/x-icon">
    <title>Reportes</title>
</head>
<body>
    <br>
    <h1 class="titulo">Bandeja de Entrada de Informes</h1>

    
    <?php
    function truncateContent($content, $limit) {
        $words = explode(' ', $content);
        if (count($words) > $limit) {
            $truncated = implode(' ', array_slice($words, 0, $limit)) . '...';
        } else {
            $truncated = $content;
        }
        return $truncated;
    }
    // Verifica si hay informes en la base de datos
    echo "<div class='card-container-informe'>";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $idInforme = $row['id'];
            $empleadoCuidador = $row['empleado'];
            $animalInforme = $row['animal'];
            $lugarInforme = $row['lugar'];
            $fechaInforme = $row['fecha'];
            $contenidoInforme = $row['contenido'];
            $truncatedContent = truncateContent($contenidoInforme, 10);
          ?>  
 
            <div class="card">
                <div class="card-body">
                <blockquote class="blockquote mb-0 informe-content">
                   <div class="row">
                        <div class="col-3">
                            <span class="text-start"><?php echo "$idInforme"; ?></span>
                        </div>
                        <div class="col-9 text-end">
                            <?php echo "$truncatedContent&nbsp&nbsp"; ?>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#informe_model" class="boton1"><i class="fa-sharp fa-solid fa-caret-down"></i></button>
                        </div>
                    </div>
                </blockquote>
                </div>  
            </div>
            <div class="modal fade" id="informe_model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Informe</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body text-center">
                    <h2 id="informe_titulo"><?php $idInforme ?></h2>
                    <p id="informe_contenido"><?php  
                        echo "<strong>Empleado:</strong><br> $empleadoCuidador<br><br>";
                        echo "<strong>Animal:</strong><br> $animalInforme<br><br>";
                        echo "<strong>Lugar:</strong><br> $lugarInforme<br><br>";
                        echo "<strong>Fecha:</strong><br> $fechaInforme<br><br>";
                        echo "<strong>Contenido:</strong><br>$contenidoInforme<br><br>";
                    ?></p>
                        <button class="boton btn-imprimir" onclick="imprimirInforme()"><i class="fa-solid fa-print" style="color: #ffffff;"></i></button>
                  </div>
                </div>
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
<script>
function imprimirInforme() {
  var contenidoInforme = document.getElementById("informe_contenido").innerHTML;
  var ventanaImpresion = window.open('', '', 'height=900,width=900');
  ventanaImpresion.document.write('<html><head><title>Informe</title></head><body>');
  ventanaImpresion.document.write(contenidoInforme);
  ventanaImpresion.document.write('</body></html>');
  ventanaImpresion.document.close();
  ventanaImpresion.print();
  ventanaImpresion.close();
}
</script>

<style>
.titulo{
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
    width: 10px;
    height:10px;
}

</style>


<script src="https://kit.fontawesome.com/6e6a67c425.js" crossorigin="anonymous"></script>
</body>
</html>