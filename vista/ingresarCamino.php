<?php
/**
 * Description of ingresarCamino
 *
 * @author Javier
 */
include_once '../controlador/Sistema.php';

$longitud       = $_POST['longitud'];
$tipoSuperficie = $_POST['tipoSuperficie'];
$idPredio       = $_POST['idPredio'];

echo "longitud = $longitud  superficie = $tipoSuperficie  predio = $idPredio";

$control = Sistema::getInstancia();
$camino = new Camino();
$ID = $control->getMaxIdCamino();

$camino->setIdCamino($ID);
$camino->setLongitud($longitud);
$camino->setTipoSuperficie($tipoSuperficie);
$camino->setIdPredio($idPredio);

$control->saveCamino($camino);

?>