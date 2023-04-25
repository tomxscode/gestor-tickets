<?php
require_once "./Trabajo.php";
require_once "../database/db.php";

if (!isset($_POST['fecha_inicio']) || !isset($_POST['fecha_final'])) {
  $fecha_inicio = date("Y-m-d", strtotime("-1 week"));
  $fecha_final = date("Y-m-d");
} else {
  $fecha_inicio = $_POST['fecha_inicio'];
  $fecha_final = $_POST['fecha_final'];
}

$trabajo = new Trabajo($conexion);
$regAccion = $trabajo->obtenerTrabajosPorRango($fecha_inicio, $fecha_final);
echo $regAccion;
?>