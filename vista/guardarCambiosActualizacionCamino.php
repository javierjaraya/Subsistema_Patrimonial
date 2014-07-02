<?php
include_once '../controlador/Sistema.php';
include_once '../controlador/Camino.php';

$camino = new Camino();
$control = Sistema::getInstancia();

$id_original = $_POST['idOriginal'];
$id = $_POST['idcamino'];
$longitud = $_POST['longitud'];
$superficie = $_POST['tiposuperficie'];
$idpredio = $_POST['idpredio'];

$camino->setIdCamino($id);
$camino->setLongitud($longitud);
$camino->setTipoSuperficie($superficie);
$camino->setIdPredio($idpredio);

$control->actualizarCamino($camino, $id_original);

?>
