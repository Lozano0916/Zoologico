<?php
session_start();

if (isset($_SESSION['carrito'])) {
    $num_productos = count($_SESSION['carrito']);
} else {
    $num_productos = 0;
}

echo $num_productos;
?>
