<?php
require_once "./Trabajo.php";
require_once "../database/db.php";

$json = file_get_contents('php://input');
$data = json_decode($json, true);
$trabajo_id = $data['trabajo_id'];

$trabajo = new Trabajo($conexion);
$trabajoInfo = $trabajo->obtenerInformacion($trabajo_id);

$resultado = array(
    'trabajo_id' => $trabajo_id,
    'informacion' => json_decode($trabajoInfo)
);

echo json_encode($resultado);
?>