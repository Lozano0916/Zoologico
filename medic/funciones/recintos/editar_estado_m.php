<?php
    require('../../../includes/conexion.php');

    $id = $_POST['id_recin_medic'];
    $nrecintos=$_POST['n_recin_medic'];
    $estado=$_POST['estado_recin_medic'];


    $editar = "UPDATE recintos SET  n_animales='$nrecintos', estado='$estado' WHERE id_recintos ='$id'";
    
    $resultado = mysqli_query($conn,$editar);
    
    
    mysqli_close($conn);

?>