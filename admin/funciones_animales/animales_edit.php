<?php
    require('../../includes/conexion.php');

    $id = $_POST['id_anim'];
    $nombre=$_POST['nombre_anim'];
    $especie=$_POST['especie_anim'];
    $ejemplares=$_POST['n_ejemplares'];


    $editar = "UPDATE animales SET nombre='$nombre',especie='$especie',
    numero_ejemplares='$ejemplares' WHERE id_animales='$id'";
    
    $resultado = mysqli_query($conn,$editar);
    
    
    mysqli_close($conn);

?>