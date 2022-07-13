<?php
session_start();
require 'dbconexion.php';
?>
<?php include('includes/header.php'); ?>
<li class="nav-item">
    <a class="nav-link" href="./index.php">
        Facturacion
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="./stock.php">
        Productos
    </a>
</li>
<li class="nav-item active">
    <a class="nav-link" href="./marcas.php">
        Marcas
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="./categorias.php">
        Categorias
    </a>
</li>
</ul>
</div>
</nav>

<div class="container col-sm-12">
    <?php include('marcas_items/searchBar.php'); ?>
    <hr>
    <?php include('message.php'); ?>
    <?php include('marcas_items/insertBar.php'); ?>
    <?php include('marcas_items/listaTable.php'); ?>
</div>
<?php include('includes/footer.php'); ?>
<script>
    $(document).ready(function() {
        $('.borrarBtnMarca').click(function(e) {
            e.preventDefault();
            var idDelete = $(this).closest("tr").find('.idDelValue').val();
            swal({
                    title: "¿Esta seguro?",
                    text: "Una vez borrado no se podra recuperar el producto!!!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        $.ajax({
                            type: "POST",
                            url: "marcas_items/crudConn.php",
                            data: {
                                "borrar_btn": 1,
                                "id_delete": idDelete,
                            },
                            success: function(respuesta) {
                                swal("Producto borrado correctamente.!", {
                                    icon: "success",
                                }).then((resultado) => {
                                    location.reload();
                                });
                            },
                            error: function(respuesta) {
                                swal({
                                    title: "Ocurrio un Error",
                                    text: "Hay un problema en la ejecucion del query SQL",
                                    icon: "warning",
                                })
                            },
                        });
                    }
                });
        });
    });
</script>
</body>

</html>