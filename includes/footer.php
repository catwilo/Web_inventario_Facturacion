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
<script src="modulos/jquery/dist/jquery.min.js"></script>
<script src="modulos/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="modulos/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {
        $('.borrarBtnAjax').click(function(e) {
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
                            url: "crudConn.php",
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