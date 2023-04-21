<?php require_once "../core/cuentas/verificar_sesion.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php require_once "../core/views/head.php"; ?>
  <link rel="stylesheet" href="../core/views/bootstrap.min.css">
  <title>Equipos</title>
</head>

<body>
  <?php require_once "../core/views/header.php"; ?>

  <div class="container">
    <div class="row">
      <div id="alert-container" class="m-1"></div>
      <h2>Gestión de equipos</h2>
      <div class="col-md-8">
        <table class="table">
          <ul id="paginador" class="pagination"></ul>
          <thead class="table-dark">
            <tr class="text-center">
              <th colspan="5">Listado</th>
            </tr>
            <tr>
              <th>ID</th>
              <th>Equipo</th>
              <th>Num. serie</th>
              <th>Dueño</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody class="table-light" id="tabla-equipos"></tbody>
        </table>
      </div>
      <div class="col-md-4">
        <div class="row" id="menu-crear">
          <div class="card">
            <div class="card-header">
              Formulario
            </div>
            <div class="card-body">
              <form id="form-crear-equipo" method="post">
                <div class="form-group">
                  <label for="marca">Marca</label>
                  <input type="text" name="marca" id="marca" class="form-control">
                </div>
                <div class="form-group">
                  <label for="modelo">Modelo</label>
                  <input type="text" name="modelo" id="modelo" class="form-control">
                </div>
                <div class="form-group">
                  <label for="serialnum">Número de serie</label>
                  <input type="text" name="serialnum" id="serialnum" class="form-control">
                </div>
                <div class="form-group">
                  <label for="detalles">Detalles</label>
                  <textarea type="text" name="detalles" id="detalles" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <label for="cliente-select">Dueño</label>
                  <input type="text" name="cliente-input" id="cliente-input" class="form-control" placeholder="Busqueda de clientes...">
                  <select name="cliente-select" id="cliente-select" class="mt-1 form-select"></select>
                </div>
                <div class="form-group mt-1">
                  <button class="form-control btn btn-primary" id="registrar-equipo">Registrar</button>
                  <button class="form-control btn btn-primary" id="editar-equipo" style="display: none;">Editar</button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../core/js/clientes_select.js"></script>
  <script src="../core/js/crear_equipo.js"></script>
  <script src="../core/js/obtener_equipos.js"></script>
  <script src="../core/js/editar_equipo.js"></script>
  <script src="../core/js/buscar_equipo_por_id.js"></script>
</body>

</html>