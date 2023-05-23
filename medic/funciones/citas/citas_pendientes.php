<?php
require('../../../includes/conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../CSS/medic.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Agenda</title>
    <script>
        document.addEventListener('DOMContentLoaded', function (){
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    locale: 'es',
                    headerToolbar: {
                        left: 'prev, next, today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,listWeek'
                    },
                    dateClick: function (info) {
                        console.log(info);
                        document.getElementById('fecha_agen').value = info.dateStr;
                        $('#myModal').modal('show');
                    }
                });
                calendar.render();

                // Agregar evento
                $('.boton').click(function () {
                    var fecha = $('#fecha_agen').val();
                    var color = $('#color_agen').val();
                    var animal = $('#animal_agen').val();
                    var razon = $('#razon_agen').val();

                    $.ajax({
                        url: 'agendar_cita.php',
                        type: 'POST',
                        data: {
                            fecha: fecha,
                            color: color,
                            animal: animal,
                            razon: razon
                        },
                        success: function (response) {
                            console.log(response);
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

                // Eliminar evento
                // Puedes agregar código para eliminar eventos si lo necesitas.
            });

    </script>
</head>
<body>
<center>
    <div class="container" style="height: 1000px; width: 1000px;">
        <div id="calendar"></div>
    </div>
</center>

<!-- Agrega el modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agendar cita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

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
                <button type="button" class="boton">Guardar</button>
            </div>
        </div>
    </div>
</div>

<style>
    .container{
        margin-top:20px;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js"></script>
</body>
</html>