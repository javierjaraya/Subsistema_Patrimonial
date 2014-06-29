<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    include_once '../controlador/Sistema.php';
    include_once '../controlador/Rodal.php';
    $anioPlantacion= $_POST['anioPlantacion'];
    $zona = $_POST['zona'];
    $superficie = $_POST['superficie'];
    $valor = $_POST['valor'];
    $manejo = $_POST['manejo'];
    $idPredio = $_POST['idpredio'];
    $idRodal = $_POST['idrodal'];
    $especie = $_POST['especie'];

    $control = Sistema::getInstancia();
    $rodal = new Rodal();
    $rodal->setAnioPlantacion($anioPlantacion);
    $rodal->setZonaCrecimiento($zona);
    $rodal->setIdEspecieArborea($especie);
    $rodal->setIdPredio($idPredio);
    $rodal->setIdRodal($idRodal);
    $rodal->setManejo($manejo);
    $rodal->setSuperficie($superficie);
    $rodal->setValorComercial($valor);
    $rodal->setEstado(1); //estado activo

    $control->saveRodal($rodal);

?>
