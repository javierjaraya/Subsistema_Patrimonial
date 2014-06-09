<?php

include_once '../controlador/Cuenta.php';
include_once '../controlador/Sistema.php';


$idCuenta = $_POST['idCuenta'];
$fechaCreacion = $_POST['fechaCreacion'];
$password = $_POST['password'];
$estado = $_POST['estado'];
$idPerfil = $_POST['idPerfil'];

$cuenta = new Cuenta();

$cuenta->setIdCuenta($idCuenta);
$cuenta->setFechaCreacion($fechaCreacion);
$cuenta->setPassword($password);
$cuenta->setEstado($estado);
$cuenta->setIdPerfil($idPerfil);

//echo $cuenta->getIdCuenta();

$control = Sistema::getInstancia();
$control->saveCuenta($cuenta);

//echo $idCuenta . " - " .$fechaCreacion. " - " .$password. " - " . $estado. " - " . $idPerfil;

?>
