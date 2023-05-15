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