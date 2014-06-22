<?php

include_once '../controlador/Sistema.php';
include_once '../controlador/Rodal.php';


$rodal = new Rodal();
$control = Sistema::getInstancia();



$idrodal = $_POST['idrodal'];
$anioPlantacion = $_POST['anioPlantacion'];
$superficie = $_POST['superficie'];
$valorComercial = $_POST['valorComercial'];
$idEspecieArborea = $_POST['idEspecieArborea'];
$manejo = $_POST['manejo'];
$zonaCrecimiento = $_POST['zonaCrecimiento'];
$estado = $_POST['estado'];


$rodal->setIdRodal($idrodal);
$rodal->setAnioPlantacion($anioPlantacion);
$rodal->setSuperficie($superficie);
$rodal->setValorComercial($valorComercial);
$rodal->setIdEspecieArborea($idEspecieArborea);
$rodal->setManejo($manejo);
$rodal->setZonaCrecimiento($zonaCrecimiento);
$rodal->setEstado($estado);

$control->actualizarRodal($rodal);





?>
