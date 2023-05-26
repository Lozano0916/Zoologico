<?php
session_start();

if (isset($_POST['id_producto']) && isset($_POST['cantidad'])) {
    $id_producto = $_POST['id_producto'];
    $cantidad = $_POST['cantidad'];

    // Agregar el producto al carrito
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }

    // Verificar si el producto ya está en el carrito
    $producto_en_carrito = false;
    foreach ($_SESSION['carrito'] as $producto) {
        if ($producto['id_producto'] == $id_producto) {
            $producto_en_carrito = true;
            break;
        }
    }

    // Si el producto no está en el carrito, agregarlo
    if (!$producto_en_carrito) {
        $_SESSION['carrito'][] = array(
            'id_producto' => $id_producto,
            'cantidad' => $cantidad
        );
    }
}

header('Location: tienda.php');
exit;
?>



