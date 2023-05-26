<?php
// Incluir el archivo de conexión
require_once('../includes/conexion.php');

// Hacer una consulta
$sql = "SELECT * FROM productos";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Tienda Souvenirs </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" type="text/css" href="../CSS/tienda.css">
 
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark ">
            <div class="container">
                <a href="../index.php" class="navbar-brand"> <img src="../images/frailecillo.png" height="60px"> </a>
                <button 
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#contenidoMenu"
                    aria-controls="contenidoMenu"
                    aria-expanded="false"
                    aria-label="Mostrar/Ocultar Navegacion">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="contenidoMenu">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a href="../index.php" class="nav-link">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link"> Productos </a>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Contacto</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
        <div class="row py-5">
            <div class="col">
                <div class="border-bottom">
                    <h1 class="text-center"> Productos </h1>
                </div>
            </div>
        </div>
        <div class="contenedor">
            <?php if ($resultado->num_rows > 0): ?>
                <?php while($row = $resultado->fetch_assoc()): ?>
                    <div class="tarjeta">
                        <img src="<?php echo $row['imagen']; ?>">
                        <h2><?php echo $row['nombre']; ?></h2>
                        <p><?php echo $row['descripcion']; ?></p>
                        <span class="precio">$<?php echo $row['precio']; ?></span>
                        <div class="cantidad_container">
                            <input type="number" class="cantidad_input" name="cantidad" value="1">
                            <button class="cantidad_btn_mas">+</button>
                            <button class="cantidad_btn_menos">-</button>
                        </div>
                        <br>
                        <form action="carrito.php" method="post">
                            <input type="hidden" name="producto_id" value="<?php echo $row['id_producto']; ?>">
                            <input type="hidden" name="cantidad" value="1">
                            <button class="boton agregar-carrito" type="submit">Agregar al carrito</button>
                        </form>
                    </div> 
                <?php endwhile; ?>
            <?php else: ?>
                <p>No se encontraron productos</p>
            <?php endif; ?>
        </div>

        <footer class="bg-dark text-white py-4">
            <div class="container">
                <div class="row">
                    <a href="#" class="col-3 text-reset text-uppercase d-flex align-items-center">
                        ZOOLOGICO
                    </a>
                    <ul class="col-3 list-unstyled">
                        <li class="font-weight-bold text-uppercase"> Recursos </li>
                        <li><a href="#" class="text-reset"> Link 1 </a></li>
                        <li><a href="#" class="text-reset"> Link 2 </a></li>
                        <li><a href="#" class="text-reset"> Link 3 </a></li>
                    </ul>
                    <ul class="col-3 list-unstyled">
                        <li class="font-weight-bold text-uppercase"> Redes sociales </li>
                        <li class="d-flex justify-content-between">
                            <a href="#" class="text-reset">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href="#" class="text-reset">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                            <a href="#" class="text-reset">
                                <i class="fa-brands fa-tiktok"></i>
                            </a>
                            <a href="#" class="text-reset">
                                <i class="fa-solid fa-hand"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script>
            // Obtener todos los elementos con la clase "cantidad-container"
            var cantidadContainers = document.getElementsByClassName("cantidad_container");

            // Iterar sobre cada "cantidad-container" para agregar la funcionalidad a los botones
            for (var i = 0; i < cantidadContainers.length; i++) {
                agregarFuncionalidadBotones(cantidadContainers[i]);
            }

            function agregarFuncionalidadBotones(container) {
                var input = container.getElementsByClassName("cantidad_input")[0];
                var botonMas = container.getElementsByClassName("cantidad_btn_mas")[0];
                var botonMenos = container.getElementsByClassName("cantidad_btn_menos")[0];

                // Escuchar el clic en el botón "+" y sumar 1 al valor del campo de entrada
                botonMas.addEventListener("click", function () {
                    var valor = parseInt(input.value);
                    input.value = valor + 1;
                });

                // Escuchar el clic en el botón "-" y restar 1 al valor del campo de entrada si es mayor que 1
                botonMenos.addEventListener("click", function () {
                    var valor = parseInt(input.value);
                    if (valor > 1) {
                        input.value = valor - 1;
                    }
                });
            }
        </script>
    </body>
</html>

<?php
// Cerrar la conexión
$conn->close();
?>



























<!--<?php
// Incluir el archivo de conexión
require_once('../includes/conexion.php');

// Hacer una consulta
$sql = "SELECT * FROM productos";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Tienda Souvenirs </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" type="text/css" href="../CSS/tienda.css">
 
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark ">
            <div class="container">
                <a href="../index.php" class="navbar-brand"> <img src="../images/frailecillo.png" height="60px"> </a>
                <button 
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#contenidoMenu"
                    aria-controls="contenidoMenu"
                    aria-expanded="false"
                    aria-label="Mostrar/Ocultar Navegacion">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="contenidoMenu">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a href="../index.php" class="nav-link">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link"> Productos </a>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Contacto</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
        <div class="row py-5">
            <div class="col">
                <div class="border-bottom">
                    <h1 class="text-center"> Productos </h1>
                </div>
            </div>
        </div>
      <div class="contenedor">
      <?php if ($resultado->num_rows > 0): ?>
      <?php while($row = $resultado->fetch_assoc()): ?>
        <div class="tarjeta">
          <img src="<?php echo $row['imagen']; ?>">
          <h2><?php echo $row['nombre']; ?></h2>
          <p><?php echo $row['descripcion']; ?></p>
          <span class="precio">$<?php echo $row['precio']; ?></span>
        <div class="cantidad_container">
          <input type="number" class="cantidad_input" name="cantidad" value="1">
          <button class="cantidad_btn_mas">+</button>
          <button class="cantidad_btn_menos">-</button>
        </div>
          <br><button class="boton">Comprar</button>
        </div> 
      <?php endwhile; ?>
    <?php else: ?>
      <p>No se encontraron productos</p>
    <?php endif; ?>
  </div>


<script>
  // Obtener todos los elementos con la clase "cantidad-container"
var cantidadContainers = document.getElementsByClassName("cantidad_container");

// Iterar sobre cada "cantidad-container" para agregar la funcionalidad a los botones
for (var i = 0; i < cantidadContainers.length; i++) {
  agregarFuncionalidadBotones(cantidadContainers[i]);
}

function agregarFuncionalidadBotones(container) {
  var input = container.getElementsByClassName("cantidad_input")[0];
  var botonMas = container.getElementsByClassName("cantidad_btn_mas")[0];
  var botonMenos = container.getElementsByClassName("cantidad_btn_menos")[0];

  // Escuchar el clic en el botón "+" y sumar 1 al valor del campo de entrada
  botonMas.addEventListener("click", function () {
    var valor = parseInt(input.value);
    input.value = valor + 1;
  });

  // Escuchar el clic en el botón "-" y restar 1 al valor del campo de entrada si es mayor que 1
  botonMenos.addEventListener("click", function () {
    var valor = parseInt(input.value);
    if (valor > 1) {
      input.value = valor - 1;
    }
  });
}

</script>

<footer class="bg-dark text-white py-4">
    <div class="container">
        <div class="row">
            <a href="#" class="col-3 text-reset text-uppercase d-flex align-items-center">
                ZOOLOGICO
            </a>
            <ul class="col-3 list-unstyled">
                <li class="font-weight-bold text-uppercase"> Recursos </li>
                <li><a href="#" class="text-reset"> Link 1 </a></li>
                <li><a href="#" class="text-reset"> Link 2 </a></li>
                <li><a href="#" class="text-reset"> Link 3 </a></li>
            </ul>
            <ul class="col-3 list-unstyled">
                <li class="font-weight-bold text-uppercase"> Redes sociales </li>
                <li class="d-flex justify-content-between">
                    <a href="#" class="text-reset">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                    <a href="#" class="text-reset">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                    <a href="#" class="text-reset">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>
                    <a href="#" class="text-reset">
                        <i class="fa-solid fa-hand"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
<?php
// Cerrar la conexión
$conn->close();
?>-->