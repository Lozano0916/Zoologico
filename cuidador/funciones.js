function estado_rec(arreglo) {
    cadena = arreglo.split(',');

    $("#id_recin").val(cadena[0]);
    $("#n_recin").val(cadena[1]);
    $("#estado_recin").val(cadena[2]);

} 
$('#ocupar_recin_boton').click(function () {
    var recolectar = $('#for_recin_edit').serialize();
    alert(recolectar);
    $.ajax({
        url: 'funciones/recinto/editar_estado.php',
        type: 'POST',
        data: recolectar,

        success: function (variable) {
            alert(variable);
            $('#recintos').load('cuidador.php #recintos');
            $('#editar_recintos').modal('hide');
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


function restarCantidad() {
    // Obtener el valor del alimento seleccionado y la cantidad ingresada
    var alimentoId = document.getElementById('id_alimento').value;
    var cantidad = parseInt(document.getElementById('restar_cantidad').value);

    // Enviar el alimento y la cantidad al servidor mediante una petición AJAX
    $.ajax({
        url: 'funciones/alimentos/restar_cantidad.php', // Archivo PHP que restará la cantidad en la base de datos
        method: 'POST',
        data: { alimentoId: alimentoId, cantidad: cantidad },
        success: function (response) {
            alert(response);
            // Mostrar una notificación de éxito o realizar otras acciones necesaria
            $('#alimentos').load('cuidador.php #alimentos');
            $('#utilizar_alimentos').modal('hide');
        },
        error: function () {
            // Manejar el error, mostrar un mensaje de error, etc.
        }
    });
}

//Agregar reporte
$('#reporte_boton').click(function () {
    var recolectar = $('#for_reporte').serialize();

    $.ajax({
        url: 'funciones/informe/reporte.php',
        type: 'POST',
        data: recolectar,

        success: function (variable1) {
            alert("Reporte enviado correctamente");
            $('#reportes_cuidador').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').hide();

            $('#nom_repor').val("");
            $('#animal_re').val("");
            $('#fecha_act').val("");
            $('#contenido_repo').val("");
        }
    })
});
$('#reporte_boton_medico').click(function () {
    var recolectar = $('#for_reporte').serialize();

    $.ajax({
        url: 'funciones/informe/reporte_medico.php',
        type: 'POST',
        data: recolectar,

        success: function (variable1) {
            alert("Reporte enviado correctamente");
            $('#reportes_cuidador').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').hide();

            $('#nom_repor').val("");
            $('#animal_re').val("");
            $('#fecha_act').val("");
            $('#contenido_repo').val("");
            $('#animal_recinto').val("");
        }
    })
});