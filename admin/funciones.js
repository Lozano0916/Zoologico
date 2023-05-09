function editar(arreglo) {
    cadena=arreglo.split(',');

    $("#nombre_").val(cadena[0]);
    $("#descripcion_").val(cadena[1]);
    $("#precio_").val(cadena[2]);
    $("#imagen_").val(cadena[3]);
}

$('#editar_tienda').click(function() {
    var recolectar = $('#for_tienda').serialize(); 

    alert(recolectar);

    $.ajax({
        URL: '../includes/tienda_mod.php',
        type: 'POST',
        data: recolectar,

        success:function(variable) {
            $('#tienda').load('admin.php #tienda');
            alert("Cambios exitosos")
        }
    })
});