<?php
require_once "./Trabajo.php";
require_once "../database/db.php";

$json = file_get_contents('php://input');
$data = json_decode($json, true);

if (!isset($data['fecha_inicio']) || !isset($data['fecha_final'])) {
  $fecha_inicio = date("Y-m-d", strtotime("-1 week"));
  $fecha_final = date("Y-m-d");
} else {
  $fecha_inicio = $data['fecha_inicio'];
  $fecha_final = $data['fecha_final'];
}

$trabajo = new Trabajo($conexion);
$regAccion = $trabajo->obtenerTrabajosPorRango($fecha_inicio, $fecha_final);
echo $regAccion;
?>