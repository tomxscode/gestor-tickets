<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "../core/views/head.php"; ?>
    <link rel="stylesheet" href="../core/views/bootstrap.min.css">
    <title>Mi cuenta</title>
</head>
<body>
    <?php require_once "../core/views/header.php"; ?>
    
    <div class="container">
        <div class="row pt-1">
            <div class="errorContainer" id="errores">

            </div>
            <div class="col-md-8">
                <h2>Clientes registrados</h2>
                <table class="table">
                    <thead class="table-dark">
                        <tr class="text-center"><th colspan="4">Listado de clientes</th></tr>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="table-light" id="tabla-clientes"></tbody>
                </table>
            </div>
            <div class="col-md-4">
                <h2>Crear cliente</h2>
                <form id="form-crear-cliente" method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        <input type="tel" name="telefono" id="telefono" class="form-control">
                    </div>
                    <div class="form-group mt-1">
                        <button type="submit" class="form-control btn btn-info">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../core/js/crear_cliente.js"></script>
    <script src="../core/js/obtener_clientes.js"></script>
    <script src="../core/js/eliminar_cliente.js"></script>
</body>
</html>