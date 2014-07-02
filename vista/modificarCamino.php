<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of modifcarCamino
 *
 * @author Javier
 */
include_once '../controlador/Sistema.php';
include_once '../controlador/Camino.php';


$idcamino = $_POST['idcamino'];

$control = Sistema::getInstancia();

$camino = $control->findCaminoById($idcamino);


$longitud = $camino->getLongitud();

$tipoSuperficie = $camino->getTipoSuperficie();
$idPredio = $camino->getIdPredio();

$superficie = $control->getSuperficieById($tipoSuperficie);
$nombreSuperficie = $superficie->getNombreSuperficie();

$idOriginal = $idcamino;
?>
<fieldset>
        <div><label>Longitud camino: </label>&nbsp;&nbsp;<img id="longitud_modificar" src="" style="display: none;"><input class="form-control longitud_modificar" type="text" id="longitud" name="longitud" <?php echo "value='$longitud'" ?> /></div>
        <div><label>Tipo Superficie: </label><input type="text" class="text ui-widget-content ui-corner-all form-control" id="tipoSuperficie" <?php echo "value='$nombreSuperficie'" ?> /></div>
        <div><label>Id Predio: </label>&nbsp;&nbsp;<img id="predio_check_modificar" src="" style="display: none;"><input class="predio_modificar form-control" ok="true" cols="30" rows="5" id="predio" name="predio" <?php echo "value='$idPredio'" ?> /></div>

        <input type="hidden" <?php echo "value=$idOriginal" ?> id="idOriginal" />

</fieldset>
