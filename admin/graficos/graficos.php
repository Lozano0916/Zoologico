<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Graficos</title>
</head>
<body>

<div class="col-lg-12" style="padding-top: 20px;">
    <div class="card">
      <h5 class="card-header">Graficos</h5>
      <div class="card-body">
        <div class="row">
            <div class="col-lg-2">
                <button class="btn btn-primary" onclick="cargar_estadis()">Estadisticas</button>
            </div>
            <canvas id="grafica"></canvas>
        </div>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.0/chart.min.js" integrity="sha512-mlz/Fs1VtBou2TrUkGzX4VoGvybkD9nkeXWJm3rle0DPHssYYx4j+8kIS15T78ttGfmOjH0lLaBXGcShaVkdkg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.0/chart.umd.min.js" integrity="sha512-TJ7U6JRJx5IpyvvO9atNnBzwJIoZDaQnQhb0Wmw32Rj5BQHAmJG16WzaJbDns2Wk5VG6gMt4MytZApZG47rCdg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
  // Obtener el elemento canvas de la página
  var ctx = document.getElementById('grafica').getContext('2d');

  // Definir los datos de la gráfica
  var data = {
    labels: ['Estudiante 1', 'Estudiante 2', 'Estudiante 3', 'Estudiante 4'],
    datasets: [
      {
        label: 'Grados',
        data: [75, 82, 68, 91],
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1
      }
    ]
  };

  // Configurar la gráfica
  var options = {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    }
  };

  // Crear la gráfica
  var chart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: options
  });

</script>
</body>
</html>






