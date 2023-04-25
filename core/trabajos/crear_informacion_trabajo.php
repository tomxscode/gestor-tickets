<?php
require_once "./Trabajo.php";
require_once "../database/db.php";

$trabajo_id = $_POST['trabajo_id'];
$ingreso = $_POST['ingreso'];
$estado = $_POST['estado'];
$diag_inicial = $_POST['diag_inicial'];

$trabajo = new Trabajo($conexion);
$id_trabajo = $trabajo->registrarInformacion($trabajo_id, $ingreso, $estado, $diag_inicial);

if ($id_trabajo) {
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