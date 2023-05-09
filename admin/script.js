$(document).ready(function () {
    // Cargar la tabla 1 por defecto
    cargarTabla('productos');

    // Función que carga la tabla correspondiente al botón que se ha hecho clic
    function cargarTabla(tabla) {
        // Realizar una petición AJAX al archivo que devuelve los datos de la tabla
        $.ajax({
            url: '../includes/conexion.php',
            type: 'POST',
            data: { tabla: tabla },
            success: function (respuesta) {
                // Actualizar el contenido del contenedor con la tabla correspondiente
                $('.container').html(respuesta);
            },
            error: function () {
                alert('Ha ocurrido un error');
            }
        });
    }

    // Asignar la función cargarTabla al evento click de cada botón del menú
    $('#tabla1').click(function () {
        cargarTabla('productos');
    });

    $('#tabla2').click(function () {
        cargarTabla('empleados');
    });

    $('#tabla3').click(function () {
        cargarTabla('tabla3');
    });
});
