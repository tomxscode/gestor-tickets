<?php
require_once "./Cliente.php";
require_once "../database/db.php";

$request_body = file_get_contents('php://input');
$data = json_decode($request_body);

$nombre = $data->nombre ?? '';
$telefono = $data->telefono ?? '';

echo $nombre;

// Validamos los datos del formulario
$errores = array();

if (empty($nombre)) {
  $errores[] = "El nombre es requerido";
}
if (empty($telefono)) {
  $errores[] = "El teléfono es requerido";
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
  $clienteCreado = $cliente->crearCliente($nombre, $telefono);
  echo json_encode(
    array(
      'success' => true
    )
  );
}

?>