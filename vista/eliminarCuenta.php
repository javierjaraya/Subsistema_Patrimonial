<?php

include_once '../controlador/Sistema.php';
include_once '../controlador/Cuenta.php';

$id = $_POST['idCuenta'];
echo 1;
echo $id;
$control = Sistema::getInstancia();

$control->eliminarCuenta($id);



?>