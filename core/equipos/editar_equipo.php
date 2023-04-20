<?php
require_once "./Equipo.php";
require_once "../database/db.php";

$request_body = file_get_contents('php://input');
$data = json_decode($request_body);


?>