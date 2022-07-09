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
                }
            } else {
                echo "<td><h5> NO SE ENCONTRARON REGISTROS </h5></td><td></td><td></td><td></td><td></td><td></td>";
            }
            ?>
        </tbody>
    </table>
</div>