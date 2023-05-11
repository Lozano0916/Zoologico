//Editar productos a la tienda
function editar(arreglo) {
    cadena=arreglo.split(',');

    $("#id_").val(cadena[0]);
    $("#nombre_").val(cadena[1]);
    $("#descripcion_").val(cadena[2]);
    $("#precio_").val(cadena[3]);
    $("#imagen_").val(cadena[4]);
}

$('#editar_tienda').click(function() {
    var recolectar = $('#for_tienda').serialize(); 
    
    $.ajax({
        url: 'funciones_tienda/tienda_mod.php',
        type: 'POST',
        data: recolectar,

        success:function(variable) {
            $('#tienda').load('admin.php #tienda');
            $('#editar').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').hide();
        },
        error: function (xhr, status, error) {
            console.log(xhr);
            console.log(status);
            console.log(error);
        }
    })
    
}); 
//Agregar productos a la tienda
$('#agregar_tienda').click(function () {
    var recolectar = $('#for_tienda_agg').serialize();

    $.ajax({
        url: 'funciones_tienda/tienda_agregar.php',
        type: 'POST',
        data: recolectar,

        success: function (variable1) {
            $('#tienda').load('admin.php #tienda');
            $('#agregar').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').hide();

            $('#nombre_gg').val("");
            $('#descripcion_gg').val("");
            $('#precio_gg').val("");
            $('#imagen_gg').val("");
        }
    })
});

//Eliminar productos de la tienda
function eliminar(arreglo) {
    cadena = arreglo.split(',');

    $("#id_eli").val(cadena[0]);
    $("#pro_eli").val(cadena[1]);
    alert(cadena);
}

$('#eliminar_tienda').click(function () {
    var recolectar = $('#for_tienda_eli').serialize();
    alert(recolectar);
    $.ajax({
        url: 'funciones_tienda/tienda_eliminar.php',
        type: 'POST',
        data: recolectar,

        success: function (variable1) {
            $('#tienda').load('admin.php #tienda');
            $('#eliminar').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').hide();
        }
    })
}); 