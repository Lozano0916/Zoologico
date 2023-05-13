<?php
    require('../../includes/conexion.php');

    $id = $_POST['id_medic'];
    $nombre=$_POST['nombre_medicamento'];
    $laboratorio=$_POST['laboratorio_'];
    $existencias=$_POST['existencias_med'];
    $vencimiento=$_POST['fecha_vencimi'];
    $compra=$_POST['fecha_compr'];
    $lote=$_POST['lote_med'];
    


    $editar = "UPDATE medicamentos SET nombre='$nombre',laboratorio='$laboratorio',
    existencias='$existencias',fecha_vencimiento='$vencimiento',
    fecha_compra='$compra',lote='$lote' WHERE id_medicamento='$id'";
    
    $resultado = mysqli_query($conn,$editar);
    
    
    mysqli_close($conn);

?>