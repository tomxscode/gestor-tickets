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
      <div class="col-md-8">
        <table class="table">
          <ul id="paginador" class="pagination"></ul>
          <thead class="table-dark">
            <tr class="text-center">
              <th colspan="6">Listado de trabajos</th>
            </tr>
            <tr>
              <th>ID</th>
              <th>Equipo</th> <!-- Enlace al equipo (ejecuta un pop up con la info del equipo) -->
              <th>Trabajo</th> <!-- Información breve -->
              <th>Fecha ingreso</th> <!-- Fecha de ingreso -->
              <th>Estado</th> <!-- Mostrar si está cerrado, en proceso o esperando contacto -->
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody class="table-light" id="tabla-equipos"></tbody>
        </table>
      </div>
      <div class="col-md-4">
        
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>