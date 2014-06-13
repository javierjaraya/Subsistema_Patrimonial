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
$caminos = $control->findCaminoById($idcamino);

?>


<form action="" method="POST">
                <div><label>Identificador Camino: </label><input type="text" class="idcamino" name="idcamino" value="<?php echo $caminos->getIdCamino(); ?>" /></div>
                <div><label>Longitud : </label><input type="text" class="longitud" name="longitud" value="<?php echo $caminos->getLongitud(); ?>"/></div>
                <div><label>Tipo superficie :</label><input cols="30" rows="5" class="tiposuperficie" name="tiposuperficie" value="<?php echo $caminos->getTipoSuperficie(); ?>"/></div>
    <div><label>Predio : </label><input cols="30" rows="5" class="predio" name="predio" value="<?php echo $caminos->getIdPredio(); ?>"></input></div>
  </form>