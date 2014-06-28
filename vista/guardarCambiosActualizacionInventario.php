<?php

include_once '../controlador/Sistema.php';
include_once '../controlador/Inventario.php';


$inventario = new Inventario();
$control = Sistema::getInstancia();

$idInventario = $_POST['idInventario'];
$idRodal =  $_POST['idrodal'];
$servicio = $_POST['servicio'];
$sistemaInventario = $_POST['sistemaInventario'];
$diametroMedio = $_POST['diametroMedio'];
$alturaDominante = $_POST['alturaDominante'];
$areaBasal = $_POST['areaBasal'];
$volumen = $_POST['volumen'];
$numeroArboles = $_POST['numeroArboles'];
$altura = $_POST['altura'];
$fechaMedicion = $_POST['fechaMedicion'];


$inventario->setIdInventario($idInventario);
$inventario->setIdRodal($idRodal);
$inventario->setServicio($servicio);
$inventario->setSistemaInventario($sistemaInventario);
$inventario->setDiametroMedio($diametroMedio);
$inventario->setAlturaDominante($alturaDominante);
$inventario->setAreaBasal($areaBasal);
$inventario->setVolumen($volumen);
$inventario->setNumeroArboles($numeroArboles);
$inventario->setAltura($altura);
$inventario->setFechaMedicion($fechaMedicion);

$control->actualizarInventario($inventario);



?>
