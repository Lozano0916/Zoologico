<?php
session_start();

if (isset($_POST['producto_id']) && isset($_POST['cantidad'])) {
    $producto_id = $_POST['producto_id'];
    $cantidad = $_POST['cantidad'];

    // Agregar el producto al carrito
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }

    // Verificar si el producto ya está en el carrito
    $producto_en_carrito = false;
    foreach ($_SESSION['carrito'] as $producto) {
        if ($producto['producto_id'] == $producto_id) {
            $producto_en_carrito = true;
            break;
        }
    }

    // Si el producto no está en el carrito, agregarlo
    if (!$producto_en_carrito) {
        $_SESSION['carrito'][] = array(
            'producto_id' => $producto_id,
            'cantidad' => $cantidad
        );
    }
}

header('Location: tienda.php');
exit;
?>



