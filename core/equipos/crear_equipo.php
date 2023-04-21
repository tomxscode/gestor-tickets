  <?php
  require_once "./Equipo.php";
  require_once "../database/db.php";

  $request_body = file_get_contents('php://input');
  $data = json_decode($request_body);

  $marca = $data->marca ?? '';
  $modelo = $data->modelo ?? '';
  $serial = $data->serial ?? '';
  $observaciones = $data->observaciones ?? '';
  $cliente_id = $data->cliente_id ?? '';

  $errores = array();

  if (count($errores) > 0) {
    echo json_encode(
      array(
        'success' => false,
        'errores' => $errores
      )
      );
  } else {
    $equipo = new Equipo($conexion);
    $equipoCreado = $equipo->crearEquipo($marca, $modelo, $serial, $cliente_id, $observaciones);
    echo json_encode(
      array(
        'success' => true
      )
      );
  }
  ?>