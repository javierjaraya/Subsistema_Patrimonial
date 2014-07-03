<?php

include_once '../controlador/CarpetaLegal.php';
include_once '../controlador/Sistema.php';


$codigo = $_POST['codigo'];
$fechaInscripcion = $_POST['fechaInscripcion'];
$rol = $_POST['rol'];
$conservador = $_POST['conservador'];
$contribucion = $_POST['contribucion'];
$idPredio = $_POST['idPredio'];
$estado = $_POST['estado'];

$carpeta = new CarpetaLegal();

$carpeta->setCodigo($codigo);
$carpeta->setFechaInscripcion($fechaInscripcion);
$carpeta->setRol($rol);
$carpeta->setConservadorBienRaiz($conservador);
$carpeta->setContribucion($contribucion);
$carpeta->setIdPredio($idPredio);
$carpeta->setEstado($estado);

$control = Sistema::getInstancia();
$control->saveCarpeta($carpeta);


?>
