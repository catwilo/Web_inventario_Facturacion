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
<li class="nav-item active">
    <a class="nav-link" href="./stock.php">
        Inventario
    </a>
</li>
</ul>
</div>
</nav>

<div class="container col-sm-12">
    <?php include('stock_items/searchBar.php'); ?>
    <hr>
    <?php include('message.php'); ?>
    <?php include('stock_items/insertBar.php'); ?>
    <?php include('stock_items/listaTable.php'); ?>
</div>
<?php include('includes/footer.php'); ?>