//////////////TIENDA///////////////////////

//Editar productos a la tienda
function editar(arreglo) {
    cadena=arreglo.split(',');

    $("#id_").val(cadena[0]);
    $("#nombre_").val(cadena[1]);
    $("#descripcion_").val(cadena[2]);
    $("#precio_").val(cadena[3]);
    $("#imagen_").val(cadena[4]);
    $("#cantidad_").val(cadena[5]);
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
            $('#cantidad_gg').val("");
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

//////////////EMPLEADOS///////////////////////

//editar empleados
function editar_emp(arreglo2) {
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
$('#editar_empleados_boton').click(function () {
    var recolectar = $('#for_empleados_agg').serialize();
    alert(recolectar);
    $.ajax({
        url: 'funciones_empleados/empleados_edit.php',
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

//Agregar empleados
$('#agregar_empleados_boton').click(function () {
    var recolectar = $('#for_empleados_agg').serialize();

    $.ajax({
        url: 'funciones_empleados/empleados_agg.php',
        type: 'POST',
        data: recolectar,

        success: function (variable1) {
            $('#empleados').load('admin.php #empleados');
            $('#agregar_empleados').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').hide();

            $('#tipo_empleado_agg').val("");
            $('#nombre_empleado_agg').val("");
            $('#email_empleado_agg').val("");
            $('#sexo_empleado_agg').val("");
            $('#numero_empleado_agg').val("");
            $('#edad_empleado_agg').val("");
            $('#direccion_empleado_agg').val("");
            $('#contraseña_empleado_agg').val("");
        
        }
    })
});

//Eliminar empleados
function eliminar_emp(arreglo2) {
    cadena = arreglo2.split(',');

    $("#id_eli_emple").val(cadena[0]);
    $("#pro_eli_emple").val(cadena[2]);
    alert(cadena);
}
$('#eliminar_empleados_boton').click(function () {
    var recolectar = $('#for_empleados_eli').serialize();
    $.ajax({
        url: 'funciones_empleados/empleados_eliminar.php',
        type: 'POST',
        data: recolectar,

        success: function (variable1) {
            $('#empleados').load('admin.php #empleados');
            $('#eliminar_empleados').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').hide();
        }
    })
}); 

//////////////MEDICAMENTOS///////////////////////

//Editar medicamentos
function editar_med(arreglo3) {
    cadena = arreglo3.split(',');
    alert(arreglo3);

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
    alert(recolectar);
    $.ajax({
        url: 'funciones_medic/medicamentos_edit.php',
        type: 'POST',
        data: recolectar,

        success: function (variable) {
            alert(variable);
            $('#medicamentos').load('admin.php #medicamentos');
            $('#editar_med').modal('hide');
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

//Agregar medicamentos
$('#agregar_medic_boton').click(function () {
    var recolectar = $('#for_medic_agg').serialize();

    $.ajax({
        url: 'funciones_medic/medicamentos_agg.php',
        type: 'POST',
        data: recolectar,

        success: function (variable1) {
            $('#medicamentos').load('admin.php #medicamentos');
            $('#agregar_medicamentos').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').hide();

            $('#nombre_medic_agg').val("");
            $('#laboratorio_medic_agg').val("");
            $('#existencias_medic_agg').val("");
            $('#fecha_vencimi_agg').val("");
            $('#fecha_compr_agg').val("");
            $('#lote_med_agg').val("");
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
        url: 'funciones_medic/medicam_eliminar.php',
        type: 'POST',
        data: recolectar,

        success: function (variable1) {
            $('#medicamentos').load('admin.php #medicamentos');
            $('#eliminar_med').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').hide();
        }
    })
});

//////////////RECINTOS///////////////////////

//Editar recintos
function editar_rec(arreglo4) {
    cadena = arreglo4.split(',');
    alert(arreglo4);

    $("#id_recin").val(cadena[0]);
    $("#tipo_recin").val(cadena[1]);
    $("#n_recin").val(cadena[2]);
    $("#estado_recin").val(cadena[3]);
}

$('#editar_recin_boton').click(function () {
    var recolectar = $('#for_recin_edit').serialize();
    alert(recolectar);
    $.ajax({
        url: 'funciones_recintos/recin_edit.php',
        type: 'POST',
        data: recolectar,

        success: function (variable) {
            alert(variable);
            $('#recintos').load('admin.php #recintos');
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

//Agregar recintos
$('#agregar_recin_boton').click(function () {
    var recolectar = $('#for_recin_agg').serialize();

    $.ajax({
        url: 'funciones_recintos/recintos_agg.php',
        type: 'POST',
        data: recolectar,

        success: function (variable1) {
            $('#recintos').load('admin.php #recintos');
            $('#agregar_recinto').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').hide();

            $('#tipo_recin_agg').val("");
            $('#n_recin_agg').val("");
            $('#estado_recin_agg').val("");
        }
    })
});

//Eliminar recinto
function eliminar_rec(arreglo4) {
    cadena = arreglo4.split(',');

    $("#id_eli_recin").val(cadena[0]);
    $("#eli_estado").val(cadena[3]);
}
$('#eliminar_recinto_boton').click(function () {
    var recolectar = $('#for_recinto_eli').serialize();
    $.ajax({
        url: 'funciones_recintos/recintos_eliminar.php',
        type: 'POST',
        data: recolectar,

        success: function (variable1) {
            $('#recintos').load('admin.php #recintos');
            $('#eliminar_recintos').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').hide();
        }
    })
});

//////////////ANIMALES///////////////////////

//Editar animales
function editar_ani(arreglo5) {
    cadena = arreglo5.split(',');
    alert(cadena);
    $("#id_anim").val(cadena[0]);
    $("#nombre_anim").val(cadena[1]);
    $("#especie_anim").val(cadena[2]);
    $("#n_ejemplares").val(cadena[3]);
}

$('#editar_anim_boton').click(function () {
    var recolectar = $('#for_anim_edit').serialize();
    alert(recolectar);
    $.ajax({
        url: 'funciones_animales/animales_edit.php',
        type: 'POST',
        data: recolectar,

        success: function (variable) {
            alert(variable);
            $('#animales').load('admin.php #animales');
            $('#editar_animales').modal('hide');
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
//Agregar animales
$('#agregar_anim_boton').click(function () {
    var recolectar = $('#for_anim_agg').serialize();

    $.ajax({
        url: 'funciones_animales/animales_agg.php',
        type: 'POST',
        data: recolectar,

        success: function (variable1) {
            $('#animales').load('admin.php #animales');
            $('#agregar_animales').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').hide();

            $('#nombre_anim_agg').val("");
            $('#especie_anim_agg').val("");
            $('#n_ejemplares_agg').val("");
        }
    })
});
//Eliminar animales
function eliminar_ani(arreglo5) {
    cadena = arreglo5.split(',');

    $("#id_eli_anim").val(cadena[0]);
    $("#eli_nombre_anim").val(cadena[1]);
}
$('#eliminar_animal_boton').click(function () {
    var recolectar = $('#for_anim_eli').serialize();
    $.ajax({
        url: 'funciones_animales/animales_eliminar.php',
        type: 'POST',
        data: recolectar,

        success: function (variable1) {
            $('#animales').load('admin.php #animales');
            $('#eliminar_animales').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').hide();
        }
    })
});

//////////////ALIMENTOS///////////////////////

//Editar alimentos
function editar_ali(arreglo6) {
    cadena = arreglo6.split(',');
    
    $("#id_alim").val(cadena[0]);
    $("#nombre_alim").val(cadena[1]);
    $("#tipo_alim").val(cadena[2]);
    $("#provedor_alim").val(cadena[3]);
    $("#precio_alim").val(cadena[4]);
    $("#existen_alim").val(cadena[5]);
    $("#fecha_alim").val(cadena[6]);
}

$('#editar_alim_boton').click(function () {
    var recolectar = $('#for_alim_edit').serialize();
    $.ajax({
        url: 'funciones_alimentos/alimentos_edit.php',
        type: 'POST',
        data: recolectar,

        success: function (variable) {
            $('#alimentos').load('admin.php #alimentos');
            $('#editar_alimentos').modal('hide');
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
//Agregar alimentos
$('#agregar_alim_boton').click(function () {
    var recolectar = $('#for_alim_agg').serialize();

    $.ajax({
        url: 'funciones_alimentos/alimentos_agg.php',
        type: 'POST',
        data: recolectar,

        success: function (variable1) {
            $('#alimentos').load('admin.php #alimentos');
            $('#agregar_alimentos').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').hide();

            $('#nombre_alim_agg').val("");
            $('#tipo_alim_agg').val("");
            $('#provedor_alim_agg').val("");
            $('#precio_alim_agg').val("");
            $('#existen_alim_agg').val("");
            $('#fecha_alim_agg').val("");
        }
    })
});
//Eliminar alimentos
function editar_ali(arreglo6) {
    cadena = arreglo6.split(',');

    $("#id_eli_alim").val(cadena[0]);
    $("#eli_nombre_alim").val(cadena[1]);
}
$('#eliminar_alimento_boton').click(function () {
    var recolectar = $('#for_alim_eli').serialize();
    $.ajax({
        url: 'funciones_alimentos/alimentos_eliminar.php',
        type: 'POST',
        data: recolectar,

        success: function (variable1) {
            $('#alimentos').load('admin.php #alimentos');
            $('#eliminar_alimentos').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').hide();
        }
    })
});

///////////////ESTADISTICAS/////////////////

function estadisticas() {
    document.getElementById('option1').style.display = 'none';
    $.get('graficos/graficos.php',function (mensaje,estado) {

        document.getElementById('estadisticas').innerHTML=mensaje;
    })
}