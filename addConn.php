<?php
session_start();
require 'dbconexion.php';

if (isset($_POST['botonSave'])) {

    $name = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $mark = mysqli_real_escape_string($conexion, $_POST['marca']);
    $available = mysqli_real_escape_string($conexion, $_POST['disponible']);
    $v_unitario = mysqli_real_escape_string($conexion, $_POST['valorUnitario']);
    $cod_barr = mysqli_real_escape_string($conexion, $_POST['codigoBarras']);

    $query = "INSERT INTO `Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`) VALUES ('$name','$mark','$available','$v_unitario','$cod_barr')";
    $query_run = mysqli_query($conexion, $query);

    if ($query_run) {
        $_SESSION['message'] = "  Producto agregado correctamente.";
        header("Location: stock.php");
        exit(0);
    } else {
        $_SESSION['message'] = "  Hay un problema para agregar el producto...";
        header("Location: stock.php");
        exit(0);
    }
}
if (isset($_POST['botonUpdate'])) {

    $name = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $mark = mysqli_real_escape_string($conexion, $_POST['marca']);
    $available = mysqli_real_escape_string($conexion, $_POST['disponible']);
    $v_unitario = mysqli_real_escape_string($conexion, $_POST['valorUnitario']);
    $cod_barr = mysqli_real_escape_string($conexion, $_POST['codigoBarras']);

    $query = "UPDATE `Productos` SET `nombre`='$name', `marca`='$mark', `disponible`='$available', `valor_unitario`='$v_unitario' 
        WHERE `Productos`.`codigo_barras`='$cod_barr'";
    $query_run = mysqli_query($conexion, $query);

    if ($query_run) {
        $_SESSION['message'] = "  Producto actualizado correctamente.";
        header("Location: stock.php");
        exit(0);
    } else {
        $_SESSION['message'] = "  Hay un problema para actualizar el producto...";
        header("Location: stock.php");
        exit(0);
    }
}
