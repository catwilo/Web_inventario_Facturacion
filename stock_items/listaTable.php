<div class="table-responsive" id="tabla">
    <table class="table table-striped">
        <thead class="thead-dark">
            <th width="1%"><span class="oi oi-command"></span></th>
            <th width="25%">Nombre</th>
            <th width="15%">Marca</th>
            <th width="5%">Disp</th>
            <th width="1%">V_Unit</th>
            <th width="1%">Cod_barras</th>
            <th width="1%">Edicion</th>
        </thead>
        <tbody>
            <?php
            if ($_GET['dato'] != '') {
                $dato = $_GET['dato'];

                $query = "SELECT * FROM `Productos` WHERE INSTR(nombre,'$dato')>0 OR  INSTR(marca,'$dato')>0 OR INSTR(codigo_barras,'$dato')>0;";

                $query_run = mysqli_query($conexion, $query);
                if (mysqli_num_rows($query_run) > 0) {
                    $contador = 1;
                    foreach ($query_run as $item) { ?>
                        <tr>
                            <td class="col-1"><?= $contador ?></td>
                            <td><?= $item['nombre']; ?></td>
                            <td><?= $item['marca']; ?></td>
                            <td><?= $item['disponible']; ?></td>
                            <td><?= $item['valor_unitario']; ?></td>
                            <td><?= $item['codigo_barras']; ?>
                            </td>
                            <td>
                                <a class="btn btn-success" href="stock.php?id=<?= $item['id']; ?>">
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
                $query = "SELECT * FROM `Productos`";
                $query_run = mysqli_query($conexion, $query);
                if (mysqli_num_rows($query_run) > 0) {
                    $contador = 1;
                    foreach ($query_run as $item) { ?>
                        <tr>
                            <td class="col-1"><?= $contador ?></td>
                            <td><?= $item['nombre']; ?></td>
                            <td><?= $item['marca']; ?></td>
                            <td><?= $item['disponible']; ?></td>
                            <td><?= $item['valor_unitario']; ?></td>
                            <td><?= $item['codigo_barras']; ?>
                            </td>
                            <td class='col-sm-4' style="text-align: right;">
                                <a class="btn btn-success" href="stock.php?id=<?= $item['id']; ?>">
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
            }
            ?>
        </tbody>
    </table>
</div>