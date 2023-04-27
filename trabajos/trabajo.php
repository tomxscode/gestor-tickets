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
      <h1 id="identificador">Título</h1>
      <div class="row">
        <div class="col-6">
          <h3 id="ingreso">Fecha de ingreso</h3>
        </div>
        <div class="col-6">
          <h3>Estado: <span id="estado">...</span></h3>
        </div>
      </div>
      <div class="row">
        <h2>Acciones</h2>
        <div id="accion-container">
        </div>
      </div>
    </div>

      <form id="form-crear_accion">
        Comentarios
        <input type="text" id="comentario">
        Precio
        <input type="text" id="precio">
        Trabajo ID
        <input type="text" id="trabajo_id">
        Fecha
        <input type="date" id="fecha">
        Accionador
        <input type="text" id="accionador">
        <button>Enviar</button>
      </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../core/js/trabajos/obtener_informacion.js"></script>
    <script src="../core/js/trabajos/obtener_acciones.js"></script>
    <script src="../core/js/trabajos/crear_accion.js"></script>
</body>

</html>