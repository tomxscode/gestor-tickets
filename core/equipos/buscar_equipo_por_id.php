<?php
require_once "./Equipo.php";
require_once "../database/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $request_body = file_get_contents('php://input');
  $data = json_decode($request_body);

  $equipo_id = $data->equipo_id;

  $equipo = new Equipo($conexion);
  $resultado = $equipo->obtenerEquipoPorId($equipo_id);

  if ($resultado) {
    echo json_encode(array(
      'success' => true,
      'equipo' => array(
        'id' => $resultado['id'],
        'marca' => $resultado['marca'],
        'modelo' => $resultado['modelo'],
        'dueno' => $resultado['dueno'],
        'serial' => $resultado['serial'],
        'comentarios' => $resultado['comentarios']
      )
      ));
  } else {
    echo json_encode(array(
      'success' => false,
      'mensaje' => 'No se encontró ningun equipo con esa ID'
    ));
  }
}
?>