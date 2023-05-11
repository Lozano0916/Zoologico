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
    alert(recolectar);
    
    $.ajax({
        url: 'funciones/tienda_mod.php',
        type: 'POST',
        data: recolectar,

        success:function() {
            alert("Si recolecte los datos");
            $('#tienda').load('admin.php #tienda');
            $('#editar').modal('hide');
        },
        error: function (xhr, status, error) {
            console.log(xhr);
            console.log(status);
            console.log(error);
        }
    })
    
}); 

//$('#agregar_tienda').click(function () {
//    var recolectar = $('#for_tienda_agg').serialize();
//
//    alert(recolectar);
//
//    $.ajax({
//        URL: 'funciones/tienda_agregar.php',
//        type: 'POST',
//        data: recolectar,
//
//        success: function (variable) {
//            $('#tienda').load('admin.php #tienda');
//            $('#agregar').modal('hide');
//        }
//    })
//});