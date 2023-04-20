<?php
require_once "./Equipo.php";
require_once "../database/db.php";

$request_body = file_get_contents('php://input');
$data = json_decode($request_body);

$equipo_id = $data->equipo_id;
$marca = $data->marca;
$modelo = $data->modelo;
$dueno = $data->dueno;
$serial = $data->serial;
$comentarios = $data->comentarios;

$errores = array();
if (empty($marca)) {
  $errores += "La marca no puede estar vacia";
}
if (empty($modelo)) {
  $errores += "El modelo no puede estar vacio";
}
if (empty($serial)) {
  $errores += "El serial no puede estar vacio";
}
if (empty($dueno)) {
  $errores += "El equipo debe tener un dueño";
}

if (count($errores) > 0) {
  echo json_encode(
    array(
      'success' => false,
      'errores' => $errores
    )
    );
} else {
  $equipo = new Equipo($conexion);
  $equipoModificado = $equipo->editarEquipo($equipo_id, $marca, $modelo, $serial, $comentarios, $dueno);
  echo json_encode(
    array(
      'success' => true
    )
    );
}
?>