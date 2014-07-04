<?php
include_once '../controlador/Sistema.php';
include_once '../controlador/Flora.php';

$flora = new Flora();
$control = Sistema::getInstancia();

$id_flora = $_POST['idflora'];
$nombre = $_POST['nombreflora'];
$especie = $_POST['especie'];
$descripcion = $_POST['descripcion'];

echo "idcamino = ".$id_camino."  longitud =".$longitud."    idsuperficie = ".$id_superficie."  idpredio".$id_predio;

$flora->setIdFlora($id_flora);
$flora->setNombreFlora($nombre);
$flora->setEspecie($especie);
$flora->setDescripcion($descripcion);

$control->actualizarFlora($flora);

?>
