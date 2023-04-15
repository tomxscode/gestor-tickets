<?php

require_once('../database/db.php');

if (isset($_POST['email']) && isset($_POST['password'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // comprobar si el correo electrónico ya existe en la base de datos
  $sql = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
  $result = mysqli_query($conexion, $sql);
  if (mysqli_num_rows($result) > 0) {
    $response = array(
      'success' => false,
      'message' => 'El correo electrónico ya está en uso'
    );
    echo json_encode($response);
    exit;
  }

  // crear una entrada de usuario en la base de datos
  $hash = password_hash($password, PASSWORD_DEFAULT);
  $sql = "INSERT INTO usuarios (email, contrasena, nombre) VALUES ('$email', '$hash', 'hola')";
  if (mysqli_query($conexion, $sql)) {
    session_start();
    $_SESSION['id_usuario'] = mysqli_insert_id($conexion);
    $_SESSION['sesion'] = true;
    $response = array(
      'success' => true,
      'message' => 'Registro exitoso',
      'id_usuario' => $_SESSION['id_usuario']
    );
    echo json_encode($response);
    exit;
  } else {
    $response = array(
      'success' => false,
      'message' => 'Error al registrar usuario'
    );
    echo json_encode($response);
    exit;
  }
}