<?php
require_once "./Trabajo.php";
require_once "../database/db.php";

$cliente_id = $_POST['cliente_id'];
$equipo_id = $_POST['equipo_id'];

$trabajo = new Trabajo($conexion);
$id_trabajo = $trabajo->registrarTrabajo($cliente_id, $equipo_id);

if ($id_trabajo) {
    // La consulta se ejecutó correctamente
    echo json_encode(
        array(
            'success' => true,
            'id_trabajo' => $id_trabajo
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