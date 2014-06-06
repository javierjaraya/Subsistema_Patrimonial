<?php

$idCuenta = $_POST['dni'];
$nombre = $_POST['nombre'];
$apPaterno = $_POST['apPaterno'];
$apMaterno = $_POST['apMaterno'];
$fechaIngreso = $_POST['fechaIngreso'];
$idCargo = $_POST['idCargo'];

echo $dni . " - " .$nombre. " - " .$apPaterno." - ". $apMaterno." - ". $fechaIngreso." - ". $idCargo." - ". $idCuenta;

?>
