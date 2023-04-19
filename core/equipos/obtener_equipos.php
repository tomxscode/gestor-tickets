<?php
require_once "./Equipo.php";
require_once "../database/db.php";

$equipo = new Equipo($conexion);

if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}

$resultados_por_pagina = $equipo->obtenerCantidad();

$inicio = ($page - 1) * $resultados_por_pagina;
$final = $inicio + $resultados_por_pagina;

//$sql = "SELECT * FROM equipos LIMIT $inicio, $final";
$sql = "SELECT equipos.*, clientes.nombre AS nombre_dueno FROM equipos JOIN clientes ON equipos.dueno = clientes.id LIMIT $inicio, $final";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
  $equipos = array();
  while ($fila = $resultado->fetch_assoc()) {
    $equipos[] = $fila;
  }
  echo json_encode($equipos);
} else {
  echo json_encode(array());
}
?>