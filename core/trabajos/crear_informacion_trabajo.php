<?php
require_once "./Trabajo.php";
require_once "../database/db.php";
$request_body = file_get_contents('php://input');
$data = json_decode($request_body);
$trabajo_id = $data->trabajo_id;
$ingreso = $data->hoyFormateado;
$estado = 0;
$diag_inicial = $data->diagnostico;

$trabajo = new Trabajo($conexion);
$infoTrabajo = $trabajo->registrarInformacion($trabajo_id, $ingreso, $estado, $diag_inicial);

if ($infoTrabajo) {
    // La consulta se ejecutó correctamente
    echo json_encode(
        array(
            'success' => true,
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