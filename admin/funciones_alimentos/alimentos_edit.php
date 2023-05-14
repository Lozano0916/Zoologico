<?php
    require('../../includes/conexion.php');

    $id = $_POST['id_alim'];
    $nombre=$_POST['nombre_alim'];
    $tipo=$_POST['tipo_alim'];
    $provedor=$_POST['provedor_alim'];
    $precio=$_POST['precio_alim'];
    $existencias=$_POST['existen_alim'];
    $fecha=$_POST['fecha_alim'];


    $editar = "UPDATE alimentos SET nombre='$nombre',tipo='$tipo',
    provedor='$provedor', precio='$precio', existencias= '$existencias', 
    fecha_vencimiento='$fecha'  WHERE id_alimento='$id'";
    
    $resultado = mysqli_query($conn,$editar);
    
    
    mysqli_close($conn);

?>