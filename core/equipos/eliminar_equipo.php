<?php
require_once "./Equipo.php";
require_once "../database/db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $request_body = file_get_contents('php://input');
  $data = json_decode($request_body);

  $equipo_id = $data->equipo_id ?? 0;

  $equipo = new Equipo($conexion);
  $equipoEliminado = $equipo->eliminarEquipo($equipo_id);
  if ($equipoEliminado) {
    echo json_encode([
      'success' => true,
      'mensaje' => 'Equipo eliminado exitosamente'
    ]);
  } else {
    echo json_encode([
      'success' => false,
      'mensaje' => 'Hubo un error al eliminar el cliente'
    ]);
  }
}
?>