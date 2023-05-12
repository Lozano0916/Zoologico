function editar(arreglo2) {
    cadena = arreglo2.split(',');

    $("#id_empleado").val(cadena[0]);
    $("#tipo_empleado").val(cadena[1]);
    $("#nombre_empleado").val(cadena[2]);
    $("#email_empleado").val(cadena[3]);
    $("#sexo_empleado").val(cadena[4]);
    $("#numero_empleado").val(cadena[5]);
    $("#edad_empleado").val(cadena[6]);
    $("#direccion_empleado").val(cadena[7]);
}
$('#editar_empleados').click(function () {
    var recolectar = $('#for_empleados').serialize();
    alert(recolectar);
    $.ajax({
        url: 'empleados_edit.php',
        type: 'POST',
        data: recolectar,

        success: function (variable) {
            alert(variable);
            $('#empleados').load('admin.php #empleados');
            $('#editar_empleados').modal('hide');
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