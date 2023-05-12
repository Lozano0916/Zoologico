//////////////TIENDA///////////////////////

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