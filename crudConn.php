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
    if ($name != '') {
        try {
            $query_run = mysqli_query($conexion, $query);
            if ($query_run) {
                $_SESSION['messageSuccess'] = "  Producto agregado correctamente.";
                header("Location: stock.php");
                exit(0);
            }
        } catch (\Throwable $th) {
            if ($v_unitario == '' or $cod_barr == '' or $available == '') {
                $_SESSION['messageFail'] = "  Falta completar los campos obligatorios.";
                header("Location: stock.php");
                exit(0);
            } else {
                $_SESSION['messageFail'] = "  El Nombre o Codigo de barras ya existe.";
                header("Location: stock.php");
                exit(0);
            }
        }
    } else {
        $_SESSION['messageFail'] = "  Es requerido un nombre de producto.";
        header("Location: stock.php");
        exit(0);
    }
} elseif (isset($_POST['botonUpdate'])) {

    $name = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $mark = mysqli_real_escape_string($conexion, $_POST['marca']);
    $available = mysqli_real_escape_string($conexion, $_POST['disponible']);
    $v_unitario = mysqli_real_escape_string($conexion, $_POST['valorUnitario']);
    $cod_barr = mysqli_real_escape_string($conexion, $_POST['codigoBarras']);
    $id = mysqli_real_escape_string($conexion, $_POST['id']);

    $query = "UPDATE `Productos` SET `nombre`='$name', `marca`='$mark', `disponible`='$available', `valor_unitario`='$v_unitario', `codigo_barras`='$cod_barr'
        WHERE `Productos`.`id`='$id'";
    try {
        $query_run = mysqli_query($conexion, $query);
        if ($query_run) {
            $_SESSION['messageSuccess'] = "  Producto actualizado correctamente.";
            header("Location: stock.php");
            exit(0);
        }
    } catch (\Throwable $th) {
        $_SESSION['messageFail'] = "  No se ha podido ejecutar el comando de actualizacion";
        header("Location: stock.php");
        exit(0);
    }
} elseif (isset($_POST['deleteProduct'])) {
    $idDelete = mysqli_real_escape_string($conexion, $_POST['deleteProduct']);
    $query = "DELETE FROM Productos WHERE id = '$idDelete'";

    try {
        $query_run = mysqli_query($conexion, $query);
        if ($query_run) {
            $_SESSION['messageSuccess1'] = "  Producto eliminado correctamente.";
            header("Location: stock.php");
            exit(0);
        }
    } catch (\Throwable $th) {
        $_SESSION['messageFail'] = "  No se ha podido ejecutar el comando de eliminacion";
        header("Location: stock.php");
        exit(0);
    }
}
