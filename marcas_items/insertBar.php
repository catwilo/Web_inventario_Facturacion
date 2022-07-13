<div class="accordion" id="acordionTarjeta">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-outline-primary col-sm-12" type="button" data-toggle="collapse" data-target="#collapseInsertar" aria-expanded="true" aria-controls="collapseInsertar">
                    Insertar una Marca
                </button>
            </h5>
        </div>

        <?php
        if (isset($_GET['id'])) {

            $id = mysqli_real_escape_string($conexion, $_GET['id']);
            $query = "SELECT * FROM Marcas WHERE id='$id'";
            $query_run = mysqli_query($conexion, $query);

            if (mysqli_num_rows($query_run) > 0) {

                $marca = mysqli_fetch_array($query_run); ?>

                <div id="collapseActualizar" class="collapse show" aria-labelledby="headingOne" data-parent="#acordionTarjeta">
                    <div class="card-body">

                        <form class="form-row" action="marcas_items/crudConn.php" method="post">
                            <div class="form-group col-sm-11">
                                <input type="text" class="form-control" value="<?= $marca['nombre']; ?>" name="nombre">
                            </div>

                            <input type="hidden" name="id" value="<?= $marca['id']; ?>">

                            <button type="submit" name="botonUpdate" class="btn btn-lg btn-outline-success col-sm-1 botonAgregar">
                                <span class="oi oi-plus"></span>
                            </button>
                        </form>
                    </div>
                </div>
            <?php
            } else {
                echo "<h4>Ninguna Marca registrada con el Id especificado</h4>";
            }
        } elseif (isset($_GET['error'])) {
            ?>
            <div id="collapseInsertar" class="collapse show" aria-labelledby="headingOne" data-parent="#acordionTarjeta">
                <div class="card-body">
                    <form class="form-row" action="marcas_items/crudConn.php" method="post">
                        <div class="form-group col-sm-11">
                            <input type="text" class="form-control" placeholder="Nombre" name="nombre" value="<?= $_GET['name']; ?>">
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
                    <form class="form-row" action="marcas_items/crudConn.php" method="post">
                        <div class="form-group col-11">
                            <input type="text" class="form-control" placeholder="Nombre" name="nombre">
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