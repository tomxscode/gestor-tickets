<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php require_once "../core/views/head.php"; ?>
  <link rel="stylesheet" href="../core/views/bootstrap.min.css">
  <title>Inicio de sesión</title>
</head>

<body class="bg-primary">

  <div class="container">
    <div class="row">
      <h1>Registro</h1>
      <div id="register-error" stlye="display: none;">

      </div>
      <form id="register-form">
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="contrasena">Contraseña:</label>
          <input type="password" name="contrasena" id="contrasena" class="form-control">
        </div>
        <div class="form-group mt-2">
          <button class="form-control btn btn-primary">Iniciar sesión</button>
        </div>
      </form>
    </div>

  </div>
  <script src="../core/js/registro_usuario.js"></script>
</body>

</html>