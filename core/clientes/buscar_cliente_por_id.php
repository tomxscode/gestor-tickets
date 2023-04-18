<?php
require_once "./Cliente.php";
require_once "../database/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  //$cliente_id = $_POST['cliente_id'];
  $request_body = file_get_contents('php://input');
  $data = json_decode($request_body);

  $cliente_id = $data->cliente_id;

  $cliente = new Cliente($conexion);
  $resultado = $cliente->buscarclientePorId($cliente_id);

  if ($resultado) {
    echo json_encode(array(
      'success' => true,
      'cliente' => array(
        'id' => $resultado['id'],
        'nombre' => $resultado['nombre'],
        'telefono' => $resultado['telefono']
      ) 
      ));
  } else {
    echo json_encode(array(
      'success' => false,
      'mensaje' => 'No se encontró ningun cliente con esa ID'
    ));
  }
}

?>