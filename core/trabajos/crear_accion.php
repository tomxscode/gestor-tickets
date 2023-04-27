<?php
require_once "./Trabajo.php";
require_once "../database/db.php";
$request_body = file_get_contents('php://input');
$data = json_decode($request_body);
$trabajo_id = $data->trabajo_id;
$accionador = $data->accionador;
$comentario = $data->comentario;
$fecha = $data->fecha;
$precio = $data->precio;
$estado = 0;

$trabajo = new Trabajo($conexion);
$regAccion = $trabajo->registrarAccion($trabajo_id, $accionador, $comentario, $fecha, $precio, $estado);

if ($regAccion) {
    // La consulta se ejecutó correctamente
    echo json_encode(
        array(
            'success' => true
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