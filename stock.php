<?php
session_start();
require 'dbconexion.php';
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventario Stock</title>
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="node_modules/open-iconic/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <hr id="espacioNavbar">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top" id="barraTop">
        <a class="navbar-brand" href="./index.php">
            Empresa Veterinaria
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php">
                        Facturacion
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="./stock.php">
                        Inventario
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="form-row">
        <div class="barraL">
            <input type="text" class="form-control" placeholder="Buscar productos">
        </div>
        <select class="custom-select barraR" size="3">
            <option value="1">Nombre</option>
            <option value="2">Marca</option>
            <option value="3">Co. Barras</option>
        </select>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-dark">
                <th>Id</th>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Disponible</th>
                <th>Valor_Unit</th>
                <th>codigo_barras</th>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM Productos";
                $query_run = mysqli_query($conexion, $query);
                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $item) {
                ?>
                        <tr>
                            <td><?= $item['id']; ?></td>
                            <td><?= $item['nombre']; ?></td>
                            <td><?= $item['marca']; ?></td>
                            <td><?= $item['disponible']; ?></td>
                            <td><?= $item['valor_unitario']; ?></td>
                            <td><?= $item['codigo_barras']; ?></td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<h5> No se encontraron registros </h5>";
                }
                ?>
                <!--formulario para agregar productos-->
                <tr>
                    <form action="connect.php" method="post">
                        <td>
                            <button type="submit" class="btn btn-outline-primary">
                                Agregar
                            </button>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nombre" name="nombre">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Marca" name="marca">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Disponible" name="disponible">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Valor_Unit" name="valorUnitario">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="codigo_barras" name="codigoBarras">
                            </div>
                        </td>
                    </form>
                </tr>
            </tbody>
        </table>
        <?php include('message.php'); ?>
    </div>
    <footer>
        <div class="row">
            <div class="col-sm-12 d-flex flex-file">
                &emsp;&emsp;
                <p>
                    Productos y asistencia
                </p>
                &emsp; &emsp;
                <p>
                    <span class="oi oi-inbox footer-icon"></span>
                    camylousuga1@gmail.com
                </p>
                &emsp;
                <p>
                    <span class="oi oi-phone"></span>
                    +57 3506933291
                </p>
            </div>
        </div>
    </footer>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>