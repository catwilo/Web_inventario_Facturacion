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
    <!--agregue un ? para que se fuerce la lectura del css-->
    <link href="css/main.css?>" rel="stylesheet">
    <link href="node_modules/open-iconic/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <hr id="espacioNavbar">
    <div class="container col-sm-12">
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
        <?php include('message.php'); ?>
        <div class="accordion" id="acordionTarjeta">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-outline-primary col-sm-12" type="button" data-toggle="collapse" data-target="#collapseInsertar" aria-expanded="true" aria-controls="collapseInsertar">
                            Insertar un nuevo Producto
                        </button>
                    </h5>
                </div>

                <?php
                if (isset($_GET['codigo_barras'])) {
                    $c_bar = mysqli_real_escape_string($conexion, $_GET['codigo_barras']);
                    $query = "SELECT * FROM Productos WHERE codigo_barras='$c_bar'";
                    $query_run = mysqli_query($conexion, $query);
                    if (mysqli_num_rows($query_run) > 0) {
                        $producto = mysqli_fetch_array($query_run);
                ?>
                        <div id="collapseInsertar" class="collapse show" aria-labelledby="headingOne" data-parent="#acordionTarjeta">
                            <div class="card-body">
                                <form class="form-row" action="addConn.php" method="post">
                                    <div class="form-group col-sm-3">
                                        <input type="text" class="form-control" value="<?= $producto['nombre']; ?>" name="nombre">
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <input type="text" class="form-control" value="<?= $producto['marca']; ?>" name="marca">
                                    </div>
                                    <div class="form-group col-sm-1">
                                        <input type="text" class="form-control" value="<?= $producto['disponible']; ?>" name="disponible">
                                    </div>
                                    <div class="form-group col-sm-2">
                                        <input type="text" class="form-control" value="<?= $producto['valor_unitario']; ?>" name="valorUnitario">
                                    </div>
                                    <div class="form-group col-sm-2">
                                        <input type="text" class="form-control" value="<?= $producto['codigo_barras']; ?>" name="codigoBarras">
                                    </div>
                                    <button type="submit" class="btn btn-lg btn-outline-success col-sm-1 botonAgregar">
                                        <span class="oi oi-plus"></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php
                    } else {
                        echo "<h4>Ningun producto registrado con el codigo de barras registrado</h4>";
                    }
                } else {
                    ?>
                    <div id="collapseInsertar" class="collapse" aria-labelledby="headingOne" data-parent="#acordionTarjeta">
                        <div class="card-body">
                            <form class="form-row" action="addConn.php" method="post">
                                <div class="form-group col-sm-3">
                                    <input type="text" class="form-control" placeholder="Nombre" name="nombre">
                                </div>
                                <div class="form-group col-sm-3">
                                    <input type="text" class="form-control" placeholder="Marca" name="marca">
                                </div>
                                <div class="form-group col-sm-1">
                                    <input type="text" class="form-control" placeholder="Disponible" name="disponible">
                                </div>
                                <div class="form-group col-sm-2">
                                    <input type="text" class="form-control" placeholder="Valor_Unit" name="valorUnitario">
                                </div>
                                <div class="form-group col-sm-2">
                                    <input type="text" class="form-control" placeholder="codigo_barras" name="codigoBarras">
                                </div>
                                <button type="submit" class="btn btn-lg btn-outline-success col-sm-1 botonAgregar">
                                    <span class="oi oi-plus"></span>
                                </button>
                            </form>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
        <div class="table-responsive" id="tabla">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Disponible</th>
                    <th>Valor_Unit</th>
                    <th>Codigo_barras</th>
                    <th>Edicion</th>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM Productos";
                    $query_run = mysqli_query($conexion, $query);
                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $item) { ?>
                            <tr>
                                <td><?= $item['nombre']; ?></td>
                                <td><?= $item['marca']; ?></td>
                                <td><?= $item['disponible']; ?></td>
                                <td><?= $item['valor_unitario']; ?></td>
                                <td><?= $item['codigo_barras']; ?></td>
                                <td class='col-sm-1'>
                                    <a class="btn btn-success" href="stock.php?codigo_barras=<?= $item['codigo_barras']; ?>">
                                        <span class="oi oi-pencil"></span>
                                    </a>
                                    <a class="btn btn-danger" href="">
                                        <span class="oi oi-trash"></span>
                                    </a>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<td><h5> NO SE ENCONTRARON REGISTROS </h5></td><td></td><td></td><td></td><td></td><td></td>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
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