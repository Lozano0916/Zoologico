<?php
    require('conexion.php');

    $nombre=$_POST['nombre_'];
    $descripcion=$_POST['descripcion_'];
    $precio=$_POST['precio_'];
    $imagen=$_POST['imagen_'];

    $editar = "UPDATE productos SET nombre = '$nombre', descripcion = '$descripcion', precio = '$descripcion', imagen = '$imagen' ";
    
    $resultado = mysqli_query($conn,$editar);
    
    mysqli_close($conn);

?>