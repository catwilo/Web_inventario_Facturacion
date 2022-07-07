<?php
session_start();
require 'dbconexion.php';

if (isset($_POST['nombre'])) {

    $name = $_POST['nombre'];
    $mark = $_POST['marca'];
    $available = $_POST['disponible'];
    $v_unitario = $_POST['valorUnitario'];
    $cod_barr = $_POST['codigoBarras'];

    $query = "INSERT INTO `Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`) VALUES ('$name','$mark','$available','$v_unitario','$cod_barr')";
    $query_run=mysqli_query($conexion, $query);

    if ($query_run) {
        $_SESSION['message'] = "Producto agregado correctamente.";
        header("Location: stock.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Hay un problema para agregar el producto...";
        header("Location: stock.php");
        exit(0);
    }
}
?>
