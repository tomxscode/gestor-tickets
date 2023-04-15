<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['sesion']) || $_SESSION['sesion'] !== true) {
  header('Location: login.php');
  exit;
}
?>