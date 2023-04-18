<?php

require_once "./Cliente.php";
require_once "../database/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $request_body = file_get_contents('php://input');
  $data = json_decode($request_body);

  $cliente_id = $data->cliente_id ?? '';
  // Obtenemos la id del cliente
  //$cliente_id = $_POST['cliente_id'];

  $cliente = new Cliente($conexion);
  $clienteEliminado = $cliente->eliminarCliente($cliente_id);

  // retornar respuesta en formato json, indicando que se eliminó el cliente
  if ($clienteEliminado) {
    echo json_encode([
        'success' => true,
        'mensaje' => 'Cliente eliminado exitosamente'
      ]);
  } else {
    echo json_encode([
        'success' => false,
        'mensaje' => 'Hubo un error al eliminar el cliente'
      ]);
  }
}

?>