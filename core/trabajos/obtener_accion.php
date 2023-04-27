<?php
require_once "./Trabajo.php";
require_once "../database/db.php";

$json = file_get_contents('php://input');
$data = json_decode($json, true);
$trabajo_id = $data['t_id'];
//$trabajo_id = 9;

$accion = new Trabajo($conexion);

$acciones = $accion->obtenerAccionesPorId($trabajo_id);
$resultado = array(
  'trabajo_id' => $trabajo_id,
  'informacion' => json_decode($acciones)
);
echo json_encode($resultado);

?>