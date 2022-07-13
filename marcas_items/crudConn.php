<?php
session_start();
require '../dbconexion.php';
if (isset($_POST['botonSave'])) {

    $name = mysqli_real_escape_string($conexion, $_POST['nombre']);

    $query = "INSERT INTO `Marcas`(`nombre`) VALUES ('$name')";

    if ($name != '') {
        try {
            $query_run = mysqli_query($conexion, $query);
            if ($query_run) {
                $_SESSION['messageSuccess'] = "  Producto agregado correctamente.";
                header("Location: ../marcas.php");
                exit(0);
            }
        } catch (\Throwable $th) {
            $_SESSION['messageFail'] = "  No se pudo agregar el producto.";
            header("Location: ../marcas.php?error&name=$name");
            exit(0);
        }
    } else {
        $_SESSION['messageFail'] = "  Es requerido un nombre de Marca.";
        header("Location: ../marcas.php?error&name=$name");
        exit(0);
    }
} elseif (isset($_POST['botonUpdate'])) {

    $name = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $id = mysqli_real_escape_string($conexion, $_POST['id']);

    $query = "UPDATE `Marcas` SET `nombre`='$name' WHERE id='$id'";
    if ($name != '') {
        try {
            $query_run = mysqli_query($conexion, $query);
            if ($query_run) {
                $_SESSION['messageSuccess'] = "  Marca actualizada correctamente.";
                header("Location: ../marcas.php");
                exit(0);
            }
        } catch (\Throwable $th) {
            $_SESSION['messageFail'] = "  No se pudo actualizar el producto.";
            header("Location: ../marcas.php?id=$id");
            exit(0);
        }
    } else {
        $_SESSION['messageFail'] = "  Es requerido un nombre de Marca.";
        header("Location: ../marcas.php?error&id=$id");
        exit(0);
    }
} elseif (isset($_POST['borrar_btn'])) {

    $del_id = $_POST['id_delete'];

    $query = "DELETE FROM Marcas WHERE id='$del_id'";

    $query_run = mysqli_query($conexion, $query);
}
