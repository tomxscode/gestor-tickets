<?php
require_once "./Trabajo.php";
require_once "../database/db.php";

$trabajo_id = $_POST['trabajo_id'];
$accionador = $_POST['accionador'];
$comentario = $_POST['comentario'];
$fecha = $_POST['fecha'];
$precio = $_POST['precio'];
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