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

                $producto = mysqli_fetch_array($query_run); ?>

                <div id="collapseActualizar" class="collapse show" aria-labelledby="headingOne" data-parent="#acordionTarjeta">
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
        } elseif (isset($_GET['error'])) {
            ?>
            <div id="collapseInsertar" class="collapse show" aria-labelledby="headingOne" data-parent="#acordionTarjeta">
                <div class="card-body">
                    <form class="form-row" action="crudConn.php" method="post">
                        <div class="form-group col-sm-3">
                            <input type="text" class="form-control" placeholder="Nombre" name="nombre" value="<?= $_GET['name']; ?>">
                        </div>
                        <div class="form-group col-sm-3">
                            <input type="text" class="form-control" placeholder="Marca" name="marca" value="<?= $_GET['mark']; ?>">
                        </div>
                        <div class="form-group col-sm-1">
                            <input type="text" class="form-control" placeholder="Disponible" name="disponible" value="<?= $_GET['available']; ?>">
                        </div>
                        <div class="form-group col-sm-2">
                            <input type="text" class="form-control" placeholder="Valor_Unit" name="valorUnitario" value="<?= $_GET['v_unitario']; ?>">
                        </div>
                        <div class="form-group col-sm-2">
                            <input type="text" class="form-control" placeholder="codigo_barras" name="codigoBarras" value="<?= $_GET['cod_barr']; ?>">
                        </div>
                        <button type="submit" name="botonSave" class="btn btn-lg btn-outline-success col-sm-1 botonAgregar">
                            <span class="oi oi-plus"></span>
                        </button>
                    </form>
                </div>
            </div>
        <?php
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