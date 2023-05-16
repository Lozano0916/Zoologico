$(document).ready(function () {
    cargarContenido('home');

    $('.nav-link').click(function (e) {
        e.preventDefault();
        var page = $(this).data('page');
        cargarContenido(page);
    });
});

function cargarContenido(page) {
    if (page == 'featured') {
        // Cargar el contenido de la tarjeta
        $.ajax({
            url: 'cargar_tarjeta.php',
            success: function (response) {
                $('#contenido').html(response);
            }
        });
    } else {
        // Cargar el contenido de la página correspondiente
        $.ajax({
            url: 'cargar_contenido.php',
            method: 'post',
            data: { page: page },
            success: function (response) {
                $('#contenido').html(response);
            }
        });
    }
}
