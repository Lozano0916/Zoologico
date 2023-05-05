<?php
session_start();
session_destroy();
header('Location: index.php'); // redireccionar a la página de inicio de sesión
exit;
?>