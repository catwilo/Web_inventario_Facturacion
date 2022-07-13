<?php
$conexion = mysqli_connect('localhost', 'root', '', 'Stock');
if (!$conexion) {
    die('Fallo la conexion  :' .mysqli_connect_error());
}
?>