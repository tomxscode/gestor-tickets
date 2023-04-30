<?php
$host = "localhost";
$user = "root";
$password = "xof#SRsg6^o9Lfd4";
$db_name = "serv_tecnico";

$conexion = mysqli_connect($host, $user, $password, $db_name);
if (mysqli_connect_errno()) {
    echo "Error al conector con la base de datos";
    exit;
}

mysqli_set_charset($conexion, 'utf8');
?>
