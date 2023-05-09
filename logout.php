<?php
session_start();
session_destroy();
header('Location: Iniciosesion.html'); // redireccionar a la página de inicio de sesión
exit;
?>