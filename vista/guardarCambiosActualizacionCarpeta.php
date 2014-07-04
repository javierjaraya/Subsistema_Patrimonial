<?php

include_once '../controlador/Sistema.php';
include_once '../controlador/CarpetaLegal.php';

$carpeta = new CarpetaLegal();
$control = Sistema::getInstancia();

$id_original = $_POST['idOriginal'];
$codigo = $_POST['codigo'];
$fechaInscripcion = $_POST['fechaInscripcion'];
$rol = $_POST['rol'];
$conservador = $_POST['conservador'];
$contribucion = $_POST['contribucion'];
$idPredio = $_POST['idPredio']; 
$estado = $_POST['estado'];


$carpeta->setCodigo($codigo);
$carpeta->setFechaInscripcion($fechaInscripcion);
$carpeta->setRol($rol);
$carpeta->setConservadorBienRaiz($conservador);
$carpeta->setContribucion($contribucion);
$carpeta->setIdPredio($idPredio);
$carpeta->setEstado($estado);

$control->actualizarCarpeta($carpeta, $id_original);


?>
