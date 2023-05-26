document.getElementById('reportes_link').addEventListener('click', function () {
    document.getElementById('reportes').style.display = 'block';
});

document.getElementById('menu_des').addEventListener('click', function () {
    document.getElementById('reportes').style.display = 'none';
});



function editar_med(arreglo3) {
    cadena = arreglo3.split(',');

    $("#id_medic").val(cadena[0]);
    $("#nombre_medicamento").val(cadena[1]);
    $("#laboratorio_").val(cadena[2]);
    $("#existencias_med").val(cadena[3]);
    $("#fecha_vencimi").val(cadena[4]);
    $("#fecha_compr").val(cadena[5]);
    $("#lote_med").val(cadena[6]);
}
$('#editar_medica_boton').click(function () {
    var recolectar = $('#for_med_edit').serialize();
    $.ajax({
        url: 'funciones/medicamentos/medicamentos_edit.php',
        type: 'POST',
        data: recolectar,

        success: function (variable) {
            $('#medicamentos').load('medic.php #medicamentos');
            $('#editar_med').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').hide();
            alert("Se ha editado correctamente");
        },
        error: function (xhr, status, error) {
            console.log(xhr);
            console.log(status);
            console.log(error);
        }
    })

});

//Agregar medicamentos
$('#agregar_medic_boton').click(function () {
    var recolectar = $('#for_medic_agg').serialize();

    $.ajax({
        url: 'funciones/medicamentos/medicamentos_agg.php',
        type: 'POST',
        data: recolectar,

        success: function (variable1) {
            $('#medicamentos').load('medic.php #medicamentos');
            $('#agregar_medicamentos_med').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').hide();

            $('#nombre_medic_agg').val("");
            $('#laboratorio_medic_agg').val("");
            $('#existencias_medic_agg').val("");
            $('#fecha_vencimi_agg').val("");
            $('#fecha_compr_agg').val("");
            $('#lote_med_agg').val("");
            alert("Medicamento agregado");
        }
    })
});

//Eliminar medicamentos
function eliminar_med(arreglo3) {
    cadena = arreglo3.split(',');

    $("#id_eli_medic").val(cadena[0]);
    $("#eli_medica").val(cadena[1]);
    alert(cadena);
}
$('#eliminar_medica_boton').click(function () {
    var recolectar = $('#for_medica_eli').serialize();
    $.ajax({
        url: 'funciones/medicamentos/medicam_eliminar.php',
        type: 'POST',
        data: recolectar,

        success: function (variable1) {
            $('#medicamentos').load('cuidador.php #medicamentos');
            $('#eliminar_med').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').hide();
            alert("Se ha eliminado correctamente");
        }
    })
});

function restarCantidad() {
    // Obtener el valor del alimento seleccionado y la cantidad ingresada
    var medicamentoId = document.getElementById('id_medicamento').value;
    var cantidad = parseInt(document.getElementById('restar_cantidad').value);

    // Enviar el alimento y la cantidad al servidor mediante una petición AJAX
    $.ajax({
        url: 'funciones/medicamentos/restar_cantidad.php', // Archivo PHP que restará la cantidad en la base de datos
        method: 'POST',
        data: { medicamentoId: medicamentoId, cantidad: cantidad },
        success: function (response) {
            alert(response);
            // Mostrar una notificación de éxito o realizar otras acciones necesaria
            $('#medicamentos').load('medic.php #medicamentos');
            $('#utilizar_medicamentos').modal('hide');
        },
        error: function () {
            // Manejar el error, mostrar un mensaje de error, etc.
        }
    });
}




///////////////OCUPAR RECINTO/////////////7
function estado_rec(arreglo) {
    cadena = arreglo.split(',');

    $("#id_recin_medic").val(cadena[0]);
    $("#n_recin_medic").val(cadena[1]);
    $("#estado_recin_medic").val(cadena[2]);

}
$('#ocupar_medic_boton').click(function () {
    var recolectar = $('#for_recin_medic').serialize();
    alert(recolectar);
    $.ajax({
        url: 'funciones/recintos/editar_estado_m.php',
        type: 'POST',
        data: recolectar,

        success: function (variable) {
            alert(variable);
            $('#recintos').load('medic.php #recintos');
            $('body').removeClass('modal-open');
            $('#ocupar_recintos_medic').modal('hide');
            $('.modal-backdrop').hide();
        },
        error: function (xhr, status, error) {
            console.log(xhr);
            console.log(status);
            console.log(error);
        }
    })

});

//////////////REPORTES//////////////
$(document).ready(function () {
    $('#reportes_link').click(function () {
        $('.opciones').hide();
        
        
        $.ajax({
            url: 'funciones/reportes/reportes.php',
            success: function (data) {
                $('#reportes').html(data);
                alert("Reporte enviado");
            }
        });
    });
});


//////////////CITAS//////////////
$(document).ready(function () {
    $('#pendientes_cita_boton').click(function () {
        $('.opciones').hide();

        $.ajax({
            url: 'funciones/citas/citas_pendientes.html',
            success: function (data1) {
                $('#citas').html(data1);
                console.log(data1);
            }
        });
    });
});
