<?php
require_once "./Cliente.php";
require_once "../database/db.php";

$request_body = file_get_contents('php://input');
$data = json_decode($request_body);

$cliente_id = $data->cliente_id ?? '';
$nombre = $data->nombre ?? '';
$telefono = $data->telefono ?? '';

$errores = array();
if (empty($nombre)) {
  $errores += "El nombre no puede estar vacio";
}
if (empty($telefono)) {
  $errores += "El teléfono no puede estar vacio";
}

if (count($errores) > 0) {
  echo json_encode(
    array(
      'success' => false,
      'errores' => $errores
    )
    );
} else {
  $cliente = new Cliente($conexion);
  $clienteModificado = $cliente->editarCliente($nombre, $telefono, $cliente_id);
  echo json_encode(
    array(
      'success' => true
    )
    );
}
?>