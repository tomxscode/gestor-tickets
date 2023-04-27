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
    <div id="alert-container"></div>
    <div class="row">
      <h1>Creación de trabajo</h1>
      <form class="form" id="form-ingreso">
        <div class="row">

          <div class="col-md-6">
            <div class="form-group">
              <label for="equipo">Equipo</label>
              <input type="text" name="equipos-input" id="equipos-input" class="form-control"
                placeholder="Busqueda de equipos...">
              <select name="equipos-select" id="equipos-select" class="mt-1 form-select"></select>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="cliente">Cliente</label>
              <input type="text" name="cliente-input" id="cliente-input" class="form-control"
                placeholder="Busqueda de clientes...">
              <select name="cliente-select" id="cliente-select" class="mt-1 form-select"></select>
            </div>
          </div>

          <div class="form-group">
            <label for="diagnostico">Diagnóstico inicial</label>
            <input type="text" name="diaginicial" id="diaginicial" placeholder="Equipo lento" class="form-control">
          </div>

          <div class="form-group mt-2">
            <button class="form-control btn btn-success" id="btn-crear">Crear órden</button>
            <button type="reset" class="form-control btn btn-danger mt-2">Limpiar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../core/js/clientes/clientes_select.js"></script>
  <script src="../core/js/equipos/equipos_select.js"></script>
  <script src="../core/js/trabajos/crear_trabajo.js"></script>
</body>

</html>