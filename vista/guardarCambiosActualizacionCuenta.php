<?php
include_once '../controlador/Sistema.php';
include_once '../controlador/Cuenta.php';

$cuenta = new Cuenta();
$control = Sistema::getInstancia();

$id_original = $_POST['idOriginal'];
$id = $_POST['idCuenta'];
$fecha = $_POST['fechaCreacion'];
$pass = $_POST['password'];
$id_perfil = $_POST['idPerfil'];
$estado = $_POST['estado'];


$cuenta->setIdCuenta($id);
$cuenta->setFechaCreacion($fecha);
$cuenta->setPassword($pass);
$cuenta->setIdPerfil($id_perfil);
$cuenta->setEstado($estado);


$control->actualizarPredio($cuenta, $id_original);


?>
