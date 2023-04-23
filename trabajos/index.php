<?php require_once "../core/cuentas/verificar_sesion.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php require_once "../core/views/head.php"; ?>
  <link rel="stylesheet" href="../core/views/bootstrap.min.css">
  <title>Trabajos</title>
</head>

<body>
  <?php require_once "../core/views/header.php"; ?>

  <div class="container">
    <div class="row">
      <div id="alert-container" class="m-1"></div>
      <h2>Gestión de trabajos</h2>
      <p>Texto de prueba, rellenar con información de la pantalla</p>
      <div class="col-md-12">
        <table class="table">
          <ul id="paginador" class="pagination"></ul>
          <thead class="table-dark">
            <tr class="text-center">
              <th colspan="7">Listado de trabajos</th>
            </tr>
            <tr>
              <th>ID</th>
              <th>IDENTIFICADOR</th> <!-- Enlace al equipo (ejecuta un pop up con la info del equipo) -->
              <th>INGRESO</th>
              <th>EGRESO</th>
              <th>ESTADO</th> <!-- Mostrar si está cerrado, en proceso o esperando contacto -->
              <th>PRECIO</th>
              <th>ACCIONES</th>
            </tr>
          </thead>
          <tbody class="table-light" id="tabla-trabajos"></tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>