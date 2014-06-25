<?php

include_once '../controlador/Sistema.php';
include_once '../controlador/Cuenta.php';

$id = $_POST['idCuenta'];

$control = Sistema::getInstancia();

$control->eliminarCuenta($id);



?>