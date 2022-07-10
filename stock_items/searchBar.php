<form method="GET" action="stock.php">
    <div class="d-flex align-items-stretch ">

        <input name="dato" type="text" class="col-sm-8 mr-1" placeholder="Buscar productos">

        <select name="columna" class="col-sm-2 custom-select" size="3">
            <option value="nombre">Nombre</option>
            <option value="marca">Marca</option>
            <option value="codigo_barras">Co. Barras</option>
        </select>

        <input class="col-sm-2 ml-1 btn btn-outline-success" type="submit" value="Buscar">
    </div>
</form>