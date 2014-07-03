<?php
include_once '../controlador/Sistema.php';
include_once '../controlador/Camino.php';

$camino = new Camino();
$control = Sistema::getInstancia();

$id_camino = $_POST['idcamino'];
$longitud = $_POST['longitud'];
$id_superficie = $_POST['superficie'];
$id_predio = $_POST['idpredio'];

echo "idcamino = ".$id_camino."  longitud =".$longitud."    idsuperficie = ".$id_superficie."  idpredio".$id_predio;

$camino->setIdCamino($id_camino);
$camino->setLongitud($longitud);
$camino->setTipoSuperficie($id_superficie);
$camino->setIdPredio($id_predio);

$control->actualizarCamino($camino);

?>
