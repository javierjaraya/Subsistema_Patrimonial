<?php
/**
 * Description of ingresarCamino
 *
 * @author Javier
 */
include_once '../controlador/Sistema.php';

$idCamino = $_POST['idcamino'];
$longitud = $_POST['longitud'];
$superficie = $_POST['superficie'];
$predio = $_POST['predio'];

echo "camino = $idCamino  longitud = $longitud  superficie = $superficie  predio = $predio";
?>
