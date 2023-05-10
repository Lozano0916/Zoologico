function editar(arreglo) {
    cadena=arreglo.split(',');

    alert(cadena)
    $("#id_").val(cadena[0]);
    $("#nombre_").val(cadena[1]);
    $("#descripcion_").val(cadena[2]);
    $("#precio_").val(cadena[3]);
    $("#imagen_").val(cadena[4]);
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
            $('#editar').modal('hide');
        }
    })
}); 