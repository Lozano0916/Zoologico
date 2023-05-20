<?php

require('../../../includes/conexion.php');


$medicamentoId = $_POST['medicamentoId'];
$cantidad = $_POST['cantidad'];


$query = "UPDATE medicamentos SET existencias = existencias - $cantidad WHERE id_medicamento = '$medicamentoId'";
$result = $conn->query($query);

if ($result) {
  echo 'OK'; 
} else {
  echo 'Error'; 
}
?>
