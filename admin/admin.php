<?php
session_start();

// Verificar si el usuario ha iniciado sesión y tiene el tipo de usuario correcto
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'administrador') {
  header('Location: login.php');
  exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Página de administración</title>
</head