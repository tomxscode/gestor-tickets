<?php
require_once "./Cliente.php";
require_once "../database/db.php";

$cliente = new Cliente($conexion);

// Obtener el número de página actual
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

// Establecer el número de resultados por página
$resultados_por_pagina = $cliente->obtenerCantidadClientes();

// Calcular el límite inferior y superior para la consulta
$inicio = ($page - 1) * $resultados_por_pagina;
$final = $inicio + $resultados_por_pagina;

// Obtener los clientes paginados
$sql = "SELECT * FROM clientes LIMIT $inicio, $final";
$resultado = $conexion->query($sql);

// Verificar si hay columnas
if ($resultado->num_rows > 0) {
    // Creamos un array para almacenar los resultados
    $clientes = array();
    // iteramos los resultados y los agregamos al array
    while ($fila = $resultado->fetch_assoc()) {
        $clientes[] = $fila;
    }
    echo json_encode($clientes);
} else {
    echo json_encode(array());
}
?>