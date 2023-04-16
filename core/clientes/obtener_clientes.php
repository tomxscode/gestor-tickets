<?php
require_once "./Cliente.php";
require_once "../database/db.php";

$cliente = new Cliente($conexion);
$datos = $cliente->obtenerClientes();
echo json_encode($datos);
?>