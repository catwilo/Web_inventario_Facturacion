<?php
$conexion = mysqli_connect('localhost', 'root', 'toor', 'Stock');
if (!$conexion) {
    die('Fallo la conexion  :' .mysqli_connect_error());
}
?>