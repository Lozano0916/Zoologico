<?php
    require('../../includes/conexion.php');

    $id = $_POST['id_anim'];
    $nombre=$_POST['nombre_anim'];
    $estado=$_POST['estado_anim'];


    $editar = "UPDATE animal SET nombre='$nombre',estado='$estado' WHERE id='$id'";
    
    $resultado = mysqli_query($conn,$editar);
    
    
    mysqli_close($conn);

?>