<form method="GET" action="stock.php">
    <div class="d-flex align-items-stretch ">

        <input name="dato" type="text" class="col-sm-8 mr-1" placeholder="Buscar productos" required="required" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);">

        <select name="columna" class="col-sm-2 custom-select" size="3">
            <option value="nombre">Nombre</option>
            <option value="marca">Marca</option>
            <option value="codBarr">Co. Barras</option>
        </select>

        <input class="col-sm-2 ml-1 btn btn-outline-success" type="submit" value="Buscar">
    </div>
</form>
<script>
    function InvalidMsg(textbox) {
        if (textbox.value === '') {
            textbox.setCustomValidity('Por favor ingrese un argumento!');
        } else {
            textbox.setCustomValidity('');
        }
    }
</script>