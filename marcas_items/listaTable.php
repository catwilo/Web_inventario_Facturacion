<div class="table-responsive" id="tabla">
    <table class="table table-striped">
        <thead class="thead-dark">
            <th width="1%"><span class="oi oi-command"></span></th>
            <th width="50%">Nombre</th>
            <th width="19%">Editar</th>
        </thead>
        <tbody>
            <?php
            if ($_GET['marca'] != '') {

                $dato = $_GET['marca'];
                $query = "SELECT * FROM `Marcas` WHERE INSTR(nombre,'$dato')>0";

                $query_run = mysqli_query($conexion, $query);
                if (mysqli_num_rows($query_run) > 0) {
                    $contador = 1;
                    foreach ($query_run as $item) { ?>
                        <tr>
                            <td class="col-1"><?= $contador ?></td>
                            <td><?= $item['nombre']; ?><?= " " ?><?= $item['marca']; ?></td>
                            <td>
                                <a class="btn btn-success" href="marcas.php?id=<?= $item['id']; ?>">
                                    <span class="oi oi-pencil"></span>
                                </a>
                                <input type="hidden" class="idDelValue" value="<?= $item['id']; ?>">
                                <a href="javascript:void(0)" class="btn btn-outline-danger borrarBtnAjax">
                                    <span class="oi oi-trash"></span>
                                </a>
                            </td>
                        </tr>
                    <?php
                        $contador = $contador + 1;
                    }
                } else {
                    echo "<td><h5> NO SE ENCONTRARON REGISTROS </h5></td><td></td><td></td><td></td><td></td><td></td>";
                }
            } else {
                $query = "SELECT * FROM `Marcas` WHERE `id`!='1'";
                $query_run = mysqli_query($conexion, $query);
                if (mysqli_num_rows($query_run) > 0) {
                    $contador = 1;
                    foreach ($query_run as $item) { ?>
                        <tr>
                            <td class="col-1"><?= $contador ?></td>
                            <td><?= $item['nombre']; ?><?= " " ?><?= $item['marca']; ?></td>
                            <td style="padding-left: 0px;padding-right: 0px;">
                                <a class="btn btn-success" href="marcas.php?id=<?= $item['id']; ?>">
                                    <span class="oi oi-pencil"></span>
                                </a>
                                <input type="hidden" class="idDelValue" value="<?= $item['id']; ?>">
                                
                                <a href="javascript:void(0)" class="btn btn-outline-danger borrarBtnMarca">
                                    <span class="oi oi-trash"></span>
                                </a>
                            </td>
                        </tr>
            <?php
                        $contador = $contador + 1;
                    }
                } else {
                    echo "<td><h5> NO SE ENCONTRARON REGISTROS </h5></td><td></td><td></td><td></td><td></td><td></td>";
                }
            }
            ?>
        </tbody>
    </table>
</div>