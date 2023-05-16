<?php
    require('../../includes/conexion.php');

    $id = $_POST['id_'];
    $nombre=$_POST['nombre_'];
    $descripcion=$_POST['descripcion_'];
    $precio=$_POST['precio_'];
    $imagen=$_POST['imagen_'];
    $cantidad=$_POST['cantidad_'];


    $editar = "UPDATE productos SET imagen='$imagen',nombre='$nombre',descripcion='$descripcion',
    precio='$precio', cantidad='$cantidad' WHERE id_producto='$id'";
    
    $resultado = mysqli_query($conn,$editar);
    
    
    mysqli_close($conn);

?>