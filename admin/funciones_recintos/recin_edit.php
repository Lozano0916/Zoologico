<?php
    require('../../includes/conexion.php');

    $id = $_POST['id_recin'];
    $tipo=$_POST['tipo_recin'];
    $nrecintos=$_POST['n_recin'];
    $estado=$_POST['estado_recin'];


    $editar = "UPDATE recintos SET 	tipo ='$tipo', n_animales='$nrecintos', estado='$estado' WHERE id_recintos ='$id'";
    
    $resultado = mysqli_query($conn,$editar);
    
    
    mysqli_close($conn);

?>