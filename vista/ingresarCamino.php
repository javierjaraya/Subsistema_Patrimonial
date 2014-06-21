<?php
/**
 * Description of ingresarCamino
 *
 * @author Javier
 */
include_once '../controlador/Sistema.php';

$idCamino = $_POST['idcamino'];
$longitud = $_POST['longitud'];
$tipoSuperficie = $_POST['superficie'];
$idPredio = $_POST['predio'];

echo "camino = $idCamino  longitud = $longitud  superficie = $tipoSuperficie  predio = $idPredio";

$control = Sistema::getInstancia();
$camino = new Camino();
$camino->setIdCamino($idCamino);
$camino->setLongitud($longitud);
$camino->setTipoSuperficie($tipoSuperficie);
$camino->setIdPredio($idPredio);

$control->saveCamino($camino);

?>
