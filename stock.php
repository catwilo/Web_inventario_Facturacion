<?php
session_start();
require 'dbconexion.php';
?>
<?php include('includes/header.php'); ?>

<div class="container col-sm-12">
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
    <hr>
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
            if (isset($_GET['id'])) {
                $id = mysqli_real_escape_string($conexion, $_GET['id']);
                $query = "SELECT * FROM Productos WHERE id='$id'";
                $query_run = mysqli_query($conexion, $query);
                if (mysqli_num_rows($query_run) > 0) {
                    $producto = mysqli_fetch_array($query_run);
            ?>
                    <div id="collapseInsertar" class="collapse show" aria-labelledby="headingOne" data-parent="#acordionTarjeta">
                        <div class="card-body">
                            <form class="form-row" action="crudConn.php" method="post">

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

                                <input type="hidden" name="id" value="<?= $producto['id']; ?>">

                                <button type="submit" name="botonUpdate" class="btn btn-lg btn-outline-success col-sm-1 botonAgregar">
                                    <span class="oi oi-plus"></span>
                                </button>
                            </form>
                        </div>
                    </div>
                <?php
                } else {
                    echo "<h4>Ningun producto registrado con el Id especificado</h4>";
                }
            } else {
                ?>
                <div id="collapseInsertar" class="collapse" aria-labelledby="headingOne" data-parent="#acordionTarjeta">
                    <div class="card-body">
                        <form class="form-row" action="crudConn.php" method="post">
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
                            <button type="submit" name="botonSave" class="btn btn-lg btn-outline-success col-sm-1 botonAgregar">
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
                $query = "SELECT * FROM `Productos`";
                $query_run = mysqli_query($conexion, $query);
                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $item) { ?>
                        <tr>
                            <td><?= $item['nombre']; ?></td>
                            <td><?= $item['marca']; ?></td>
                            <td><?= $item['disponible']; ?></td>
                            <td><?= $item['valor_unitario']; ?></td>
                            <td><?= $item['codigo_barras']; ?></td>


                            <td class='col-sm-4'>
                                <a class="btn btn-success" href="stock.php?id=<?= $item['id']; ?>">
                                    <span class="oi oi-pencil"></span>
                                </a>
                                <form action="crudConn.php" method="POST" class=" d-inline">
                                    <button type="submit" name="deleteProduct" value="<?= $item['id']; ?>" class="btn btn-danger" href="">
                                        <span class="oi oi-trash"></span>
                                    </button>
                                </form>
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
<?php include('includes/footer.php'); ?>