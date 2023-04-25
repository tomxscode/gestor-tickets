<?php
require_once "./Trabajo.php";
require_once "../database/db.php";

$cliente_id = $_POST['cliente_id'];
$equipo_id = $_POST['equipo_id'];

$trabajo = new Trabajo($conexion);

// Creación del identificador
$sql = "SELECT clientes.nombre, equipos.modelo FROM clientes INNER JOIN equipos ON equipos.id = $equipo_id WHERE clientes.id = $cliente_id";
$resultado = mysqli_query($conexion, $sql);
$fila = mysqli_fetch_assoc($resultado);
$iniciales = strtoupper(substr($fila['nombre'], 0, 3));
$modelo = strtoupper(str_replace(' ', '', $fila['modelo']));
$identificador = $iniciales . $modelo;

$id_trabajo = $trabajo->registrarTrabajo($cliente_id, $equipo_id, $identificador);

if ($id_trabajo) {
    // La consulta se ejecutó correctamente
    echo json_encode(
        array(
            'success' => true,
            'id_trabajo' => $id_trabajo,
            'identificador' => $identificador
        )
    );
} else {
    // La consulta falló
    $error = mysqli_error($conexion);
    echo json_encode(
        array(
            'success' => false,
            'message' => 'Error al crear el registro de trabajo: ' . $error
        )
    );
}
?>