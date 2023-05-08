function editar(result) {
    cadena = result.split(',');

    
    $("nombre").val(cadena[0]);
    $("descripcion").val(cadena[1]);
    $("precio").val(cadena[2]);
    
}