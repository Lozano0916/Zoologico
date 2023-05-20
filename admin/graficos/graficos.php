<?php 
  require_once('../../includes/conexion.php');
?>
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

<?php

$sql = "SELECT productos, SUM(productos_vendidos) as total FROM productos_ventas GROUP BY productos ORDER BY total DESC LIMIT 10";
$result = $conn->query($sql);

// Paso 3: Procesar los resultados
$productos_mas_vendidos = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $producto = $row['productos'];
        $cantidad_vendida = $row['total'];
        $productos_mas_vendidos[] = array('producto' => $producto, 'productos_vendidos' => $cantidad_vendida);
    }
}

// Paso 4: Cerrar la conexión a la base de datos
$conn->close();

// Paso 5: Generar la estadística
echo "<h2>Productos más vendidos:</h2>";
echo "<table>";
echo "<tr><th>Producto</th><th>Cantidad Vendida</th></tr>";
foreach ($productos_mas_vendidos as $producto) {
    echo "<tr><td>".$producto['producto']."</td><td>".$producto['productos_vendidos']."</td></tr>";
}
echo "</table>";
?>
<script>
    // Paso 5: Generar el gráfico
    var ctx = document.getElementById('grafico').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($producto); ?>,
            datasets: [{
                label: 'Cantidad Vendida',
                data: <?php echo json_encode($cantidades); ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.0/chart.umd.min.js" integrity="sha512-TJ7U6JRJx5IpyvvO9atNnBzwJIoZDaQnQhb0Wmw32Rj5BQHAmJG16WzaJbDns2Wk5VG6gMt4MytZApZG47rCdg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.0/chart.min.js" integrity="sha512-mlz/Fs1VtBou2TrUkGzX4VoGvybkD9nkeXWJm3rle0DPHssYYx4j+8kIS15T78ttGfmOjH0lLaBXGcShaVkdkg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>


