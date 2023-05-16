<?php
    require('../../../includes/conexion.php');
    
    <?php
// Establecer la conexión con la base de datos

// ... Código de conexión a la base de datos ...

// Obtener el valor de búsqueda enviado desde el campo de entrada
$searchTerm = $_POST['searchTerm'];

// Realizar la consulta a la base de datos utilizando el valor de búsqueda
$query = "SELECT id_animales, nombre FROM animales WHERE nombre LIKE '%$searchTerm%'";
$result = $conn->query($query);

// Obtener los resultados y devolverlos en formato JSON
$animals = array();
while ($row = $result->fetch_assoc()) {
  $animal = array(
    'id_animales' => $row['id_animales'],
    'nombre' => $row['nombre']
  );
  $animals[] = $animal;
}

echo json_encode($animals);

// Cerrar la conexión con la base de datos

// ... Código para cerrar la conexión ...
?>

?>