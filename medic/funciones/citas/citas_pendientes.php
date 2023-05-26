<?php
require('../../../includes/conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../../images/frailecillo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Agenda</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://kit.fontawesome.com/6e6a67c425.js" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function (){
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    locale:'es',
                    headerToolbar: {
                        left: 'prev, next, today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,listWeek'
                    },
                        buttonText: {
                      today: 'Hoy',
                      month: 'Mes',
                      week: 'Semana',
                      day: 'Día',
                      list: 'Lista'
                    },  
                      dateClick: function(info) {
                        var clickedDate = info.date;
                        var year = clickedDate.getFullYear();
                        var month = ('0' + (clickedDate.getMonth() + 1)).slice(-2);
                        var day = ('0' + clickedDate.getDate()).slice(-2);
                        var formattedDate = year + '-' + month + '-' + day;

                        // Asigna la fecha al campo de entrada del modal
                        document.getElementById('fecha_agen').value = formattedDate;
                        
                        $('#myModal').modal('show');
                    },
                    eventSources: [
                          {
                              url: 'agendar_cita.php', // URL para obtener los eventos desde la base de datos
                              method: 'POST' // Método HTTP utilizado para la solicitud (POST en este caso)
                          }
                      ],
                      eventClick: function(info) {
                          var event = info.event;
                          var startDate = moment(event.start).format('YYYY-MM-DD');

                          $('#id_detalle').text(event.extendedProps.id_agendar);
                          $('#titulo_detalle').text(event.title);
                          $('#fecha_detalle').text(startDate);
                          $('#color_detalle').css('background', event.color);
                          $('#animal_detalle').text(event.extendedProps.animal);
                          $('#razon_detalle').text(event.extendedProps.razon_cita);
                          
                          $('#myModalAlt').modal('show');
                          
                          $('#btnEliminarEvento').off('click').on('click', function() {
                                eliminarEvento(event.extendedProps.id_agendar);                            
                            });
                        }

                        
                });
                calendar.render();
                // Agregar evento
                $('#guardar_boton').click(function () {
                    var titulo = $('#titulo_agen').val();
                    var fecha = $('#fecha_agen').val();
                    var color = $('#color_agen').val();
                    var animal = $('#animal_agen').val();
                    var razon = $('#razon_agen').val();

                    $.ajax({
                        url: 'guardar_evento.php',
                        type: 'POST',
                        data: {
                            titulo: titulo,
                            fecha: fecha,
                            color: color,
                            animal: animal,
                            razon: razon
                        },
                        success: function (response) {
                            location.reload();
                            var eventos = JSON.parse(response);
                            // Limpiar los eventos existentes en el calendario
                            calendar.getEvents().forEach(function (evento) {
                                evento.remove();
                            });
                        
                            // Agregar los eventos obtenidos al calendario
                            calendar.addEventSource(eventos);
                            calendar.refetchEvents();
                        }
                    });

                    $('#myModal').modal('hide');    
                });
                
                        
                    });        

    </script>
</head>
<body>
    <button id="btnVolver" class="boton"onclick="volverPaginaAnterior()"><i class="fa-solid fa-caret-left" style="color: #ffffff;"></i></button>

    <!-- Scripts y cierre del documento... -->

    <script>
        function volverPaginaAnterior() {
            window.history.back();
        }
    </script>
<center>
    <div class="container" style="height: 1000px; width: 1000px;">
        <div id="calendar"></div>
    </div>
</center>




<!-- Modal alternativo -->
<div class="modal fade" id="myModalAlt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Detalles de la cita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Id:</strong><br><span id="id_detalle"></span></p>
                <p><strong>Titulo:</strong><br><span id="titulo_detalle"></span></p>
                <p><strong>Fecha:</strong><br><span id="fecha_detalle"></span></p>
                <p><strong>Animal:</strong><br><span id="animal_detalle"></span></p>
                <p><strong>Razón:</strong><br> <span id="razon_detalle"></span></p>
                
            </div>
            <div class="modal-footer">
                <?php 
                    $sql = "SELECT * FROM agendar_citas";
                    $result = mysqli_query($conn, $sql);
                    while($mostrar=mysqli_fetch_array($result)){
                        $arreglo=$mostrar['id_agendar'].','.$mostrar['title'].','.$mostrar['animal'].','.$mostrar['start'].','.$mostrar['razon_cita'].','.$mostrar['color'];                        
                    
                    }
                ?>
                <button type="button" class="boton" data-bs-toggle="modal" data-bs-target="#editar_cita_model"id="btnEditarEvento" class="boton" onclick="editar_agenda_fun('<?php echo $arreglo?>')">Editar</button>
                <button type="button" class="btn btn-danger" id="btnEliminarEvento"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></button>
            </div>
        </div>
    </div>
</div>


<!-- Agrega el modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agendar cita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label for="titulo_agen" class="col-form-label">Titulo:</label>
                    <input type="text" class="form-control" id="titulo_agen" name="titulo_agen" />
                </div>

                <div class="mb-3">
                    <label for="fecha_agen" class="col-form-label">Fecha:</label>
                    <input type="date" class="form-control" id="fecha_agen" name="fecha_agen" />
                </div>

                <div class="mb-3">
                    <label for="color_agen" class="col-form-label">Color:</label>
                    <input type="color" class="form-control" id="color_agen" name="color_agen" />
                </div>

                 <div class="mb-3">
                  <label for="animal_agen" class="col-form-label">Seleccionar animal:</label>
                  <select class="form-control" id="animal_agen" name="animal_agen">
                    <?php
                      // Consultar la lista de alimentos desde la base de datos
                      $query = "SELECT id_animales, nombre FROM animales";
                      $result = $conn->query($query);

                      // Generar las opciones del menú desplegable
                      while ($row = $result->fetch_assoc()) {
                        $alimentoId = $row['id_animales'];
                        $alimentoNombre = $row['nombre'];
                        echo "<option value='$alimentoId'>$alimentoNombre</option>";
                      }
                    ?>
                  </select>
                </div>
                

                <div class="mb-3">
                    <label for="razon_agen" class="col-form-label">Razon:</label>
                    <textarea class="form-control" id="razon_agen" name="razon_agen" cols="30" rows="10"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="guardar_boton"class="boton">Guardar</button>
            </div>
        </div>
    </div>
</div>


<!-- Editar cita -->
<div class="modal fade" id="editar_cita_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Editar cita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="for_agenda_edit">
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Id:</label>
                  <input type="text" class="form-control" id="id_agen_edit" name="id_agen_edit" readonly>
                </div>
                <div class="mb-3">
                    <label for="fecha_agen" class="col-form-label">Titulo:</label>
                    <input type="text" class="form-control" id="titulo_agen_edit" name="titulo_agen_edit" />
                </div>

                <div class="mb-3">
                    <label for="fecha_agen" class="col-form-label">Fecha:</label>
                    <input type="date" class="form-control" id="fecha_agen_edit" name="fecha_agen_edit" />
                </div>

                <div class="mb-3">
                    <label for="color_agen" class="col-form-label">Color:</label>
                    <input type="color" class="form-control" id="color_agen_edit" name="color_agen_edit" />
                </div>

                 <div class="mb-3">
                  <label for="animal_agen" class="col-form-label">Seleccionar animal:</label>
                  <select class="form-control" id="animal_agen_edit" name="animal_agen_edit">
                    <?php
                      // Consultar la lista de alimentos desde la base de datos
                      $query = "SELECT id_animales, nombre FROM animales";
                      $result = $conn->query($query);

                      // Generar las opciones del menú desplegable
                      while ($row = $result->fetch_assoc()) {
                        $alimentoId = $row['id_animales'];
                        $alimentoNombre = $row['nombre'];
                        echo "<option value='$alimentoId'>$alimentoNombre</option>";
                      }
                    ?>
                  </select>
                </div>
                

                <div class="mb-3">
                    <label for="razon_agen" class="col-form-label">Razon:</label>
                    <textarea class="form-control" id="razon_agen_edit" name="razon_agen_edit" cols="30" rows="10"></textarea>
                </div>
            </div>
            </form>
            <div class="modal-footer">
                <button type="submit" id="aceptar_editar_cita" class="btn btn-primary" data-id="">Guardar</button>
            </div>
        </div>
    </div>
</div>


<style>
    .container{
        margin-top:20px;
    }
    tbody tr:hover {
        background: transparent;
    }
     #btnVolver {
            position: fixed;
            top: 20px;
            left: 20px;
    }
.boton {
    background-color: #1b492e;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.boton:hover {
    background: #218249;
}
a{
    text-decoration:none;
    cursor: text;
    color:black;
}
.fc .fc-button-primary:disabled{
    background: #1b492e;
}
.fc .fc-button-primary{
    background: #1b492e;
}
.fc .fc-button-primary:not(:disabled).fc-button-active, .fc .fc-button-primary:not(:disabled):active{
    background: #218249;
}
</style>

<script>
function eliminarEvento(idEvento) {
    // Realiza una solicitud AJAX para eliminar el evento
    $.ajax({
        url: 'eliminar_evento.php',
        type: 'POST',
        data: { id: idEvento },
        success: function(response) {
            // Maneja la respuesta del servidor si es necesario
            // Por ejemplo, puedes recargar la página o actualizar el calendario
            location.reload();
        },
        error: function(xhr, status, error) {
            // Maneja los errores si es necesario
            console.log(error);
        }
    });
},

function editar_agenda_fun(arreglo) {
    cadena = arreglo.split(',');
    alert(cadena);
    $("#id_agen_edit").val(cadena[0]);
    $("#titulo_agen_edit").val(cadena[1]);
    $("#animal_agen_edit").val(cadena[2]);
    $("#fecha_agen_edit").val(cadena[3]);
    $("#razon_agen_edit").val(cadena[4]);
    $("#color_agen_edit").val(cadena[5]);
}
</script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js"></script>
</body>
</html>