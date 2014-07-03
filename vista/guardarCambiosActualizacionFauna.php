<?php

include_once '../controlador/Sistema.php';
include_once '../controlador/Fauna.php';


$fauna = new Fauna();
$control = Sistema::getInstancia();



$idFauna = $_POST['idFauna'];
$nombre = $_POST['nombre'];
$especie = $_POST['especie'];
$descripcion =  $_POST['descripcion'];

$fauna->setIdFauna($idFauna);
$fauna->setNombreFauna($nombre);
$fauna->setEspecie($especie);
$fauna->setDescripcion($descripcion);


$control->actualizarFauna($fauna);

?>
