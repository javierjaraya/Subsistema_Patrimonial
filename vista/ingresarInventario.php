
<?php

include_once '../controlador/Sistema.php';
include_once '../controlador/Inventario.php';


$idRodal = $_POST['idpredio'];
$servicio = $_POST['servicio'];
$sistemaInventario = $_POST['sistemaInventario'];
$diametroMedio = $_POST['diametroMedio'];
$alturaDominante = $_POST['alturaDominante'];
$areaBasal = $_POST['areaBasal'];
$volumen = $_POST['volumen'];
$numeroArboles = $_POST['numeroArboles'];
$altura = $_POST['altura'];
$fecha = $_POST['fecha'];

$control = Sistema::getInstancia();

$inventario = new Inventario();

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

$control->saveInventario($inventario);








?>
