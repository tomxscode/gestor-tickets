<?php
require_once("../database/db.php");

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $contrasena = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($contrasena, $row['contrasena'])) {
            session_start();
            $_SESSION['id_usuario'] = $row['id'];
            $_SESSION['sesion'] = true;
            $response = array(
                'success' => true,
                'message' => 'Inicio de sesión exitoso',
                'id_usuario' => $row['id']
            );
            echo json_encode($response);
            exit;
        }
    }
    $response = array(
        'success' => false,
        'message' => 'Credenciales incorrectas'
    );
    echo json_encode($response);
    exit;
}
?>