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
      <h2>Gestión de trabajos</h2>
      <p>Administra los trabajos</p>
      <div id="alert-container" class="mt-3"></div>
      <div class="row mt-2 mb-2">
        <a href="crear_trabajo.php" class="btn btn-success" style="font-size: 16pt;">Crear trabajo</a>
      </div>

      <div class="col-md-12">
        <div class="row">
          <div class="col-md-6">

          </div>
          
            
          </div>

        </div>
        <div class="row table-responsive">
          <div class="col-md-10">
            <table class="table">
            <ul id="paginador" class="pagination"></ul>
            <thead class="table-dark">
              <tr class="text-center">
                <th colspan="8">Listado de trabajos</th>
              </tr>
              <tr>
                <th>ID</th>
                <th>IDENTIFICADOR</th> <!-- Enlace al equipo (ejecuta un pop up con la info del equipo) -->
                <th>INGRESO</th>
                <th>EGRESO</th>
                <th>DIAGNÓSTICO</th> <!-- Mostrar si está cerrado, en proceso o esperando contacto -->
                <th>PRECIO</th>
                <th>ESTADO</th>
                <th>ACCIONES</th>
              </tr>
            </thead>
            <tbody class="table-light" id="tabla-trabajos"></tbody>
          </table>
          </div>
          <div class="col-md-2">
            <div class="row">
              <small>Filtrado por fechas</small>
              <div class="form-group">
                <label for="fecha_inicio">Desde</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control">
              </div>
              <div class="form-group">
                <label for="fecha_final">Hasta</label>
                <input type="date" name="fecha_final" id="fecha_final" class="form-control">
              </div>
              <div class="form-group mt-2">
                <button class="btn btn-info form-control" id="btnFiltrar">Filtrar</button>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../core/js/trabajos/obtener_trabajos.js"></script>
</body>

</html>