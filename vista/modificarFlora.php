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
include_once '../controlador/Flora.php';


$idflora = $_POST['idflora'];
$control = Sistema::getInstancia();

$flora = $control->findFloraById($idflora);

//OBTENEMOS DATOS DE LA FLORA
$nombreFauna = $flora->getNombreFlora();
$especie = $flora->getEspecie();
$descripcion = $flora->getDescripcion();
?>

<fieldset>
        <div><label>Nombre Fauna: </label>&nbsp;&nbsp;<img id="nombre" src="" style="display: none;"><input class="form-control nombrefauna" type="text" id="nombrefauna" name="nombrefauna" <?php echo "value='$nombreFauna'" ?> /></div>
        <div><label>Especie Fauna: </label><input type="text" class="text ui-widget-content ui-corner-all form-control especie" id="especie" <?php echo "value='$especie'" ?> /></div>
        <div><label>Descripcion: </label>&nbsp;&nbsp;<img id="predio_check_modificar" src="" style="display: none;">
        <textarea type="text" class="descripcion form-control" ok="true" cols="50" rows="8" id="descripcion" name="descripcion"><?php echo "$descripcion" ?></textarea></div>

        <input type="hidden" <?php echo "value=$idflora" ?> id="idflora" class="idflora"/>
</fieldset>
