<?php
require_once "./Usuario.php";
require_once "../database/db.php";

session_start();
if ($_SESSION['sesion']) {
  $userid = $_SESSION['id_usuario'];
  //$userid = $_POST['id_usuario'];
  $usuario = new Usuario($conexion);
  $resultado = $usuario->obtenerUsuario($userid);
  if ($resultado) {
    echo json_encode(array(
      'success' => true,
      'usuario' => array(
        'id' => $resultado['id'],
        'nombre' => $resultado['nombre'],
        'email' => $resultado['email']
      )
      ));
  } else {
    echo json_encode(array(
      'success' => false,
      'mensaje' => 'No se encontró ningun usuario con la id ingresada'
    ));
  }
}
?>