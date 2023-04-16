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
        <div class="row">
            <h1>Clientes registrados</h1>

            <div class="col-md-8">
                <table class="table">
                    <thead class="table-dark">
                        <tr class="text-center"><th colspan="3">Listado de clientes</th></tr>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                        </tr>
                    </thead>
                    <tbody class="table-light" id="tabla-clientes"></tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../core/js/obtener_articulos.js"></script>
</body>
</html>