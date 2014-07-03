<?php

include_once '../controlador/Sistema.php';
include_once '../controlador/Rodal.php';
include_once '../controlador/EspecieArborea.php';


$idrodal = $_POST['idrodal'];

$control = Sistema::getInstancia();

$rodal = $control->findRodalById($idrodal);

$idpredio = $rodal->getIdPredio();
$idrodal = $rodal->getIdRodal();
$anioPlantacion = $rodal->getAnioPlantacion();
$superficie = $rodal->getSuperficie();
$valorComercial = $rodal->getValorComercial();
$idespecieArborea = $rodal->getIdEspecieArborea();

$listaEspecieArborea = $control->findAllEspecies();



$manejo = $rodal->getManejo();
$zonaCrecimiento = $rodal->getZonaCrecimiento();
$estado = $rodal->getEstado();



?>
<form>
<fieldset>
            <div><label>Identificador Predio: </label><input class="form-control" type="text" id="idpredio" name="idpredio" <?php echo "value='$idpredio'"?> readonly/></div>
            <div><label>Identificador Rodal: </label><input class="form-control" type="text" id="idrodal" name="idrodal" <?php echo "value='$idrodal'"?> /></div>
            <div><label>Año Plantación: </label><input type="text" class="form-control" id="anioPlantacion" <?php echo "value='$anioPlantacion'"?> /></div>
            <div><label>Superficie: </label><input type="text" class="form-control" id="superficie" <?php echo "value='$superficie'"?> /></div>
            <div><label>Valor Comercial: </label><input type="text" class="form-control" id="valorComercial" <?php echo "value='$valorComercial'"?> /></div>
            <div><label>Especie Arborea: </label>
            <select name="idEspecieArborea" id="idEspecieArborea"  class="form-control " >
              <option value="-1">Tipo de Especie Arborea </option>
              <?php
                foreach($listaEspecieArborea as $especie){
                    if($especie->getId() == $idespecieArborea){
                        echo "<option selected='selected'  value='".$especie->getId()."' >".$especie->getNombre()."</option>\n";
                    }else{
                        echo "<option value='".$especie->getId()."' >".$especie->getNombre()."</option>\n";
                    }
                    
                }
            
                ?>
        </select>
            <div><label>Manejo: </label><input type="text" class="text ui-widget-content ui-corner-all form-control" id="manejo" <?php echo "value='$manejo'"?> /></div>
            <div><label>Zona Crecimiento: </label><input type="text" class="text ui-widget-content ui-corner-all form-control" id="zonaCrecimiento" <?php echo "value='$zonaCrecimiento'"?> /></div>
      
            <div><label>Estado: </label><select id="estado" name="estado" class="form-control " size="1">
				   <option value="-1">Estado Rodal </option>
				                          <?php 
                                                            if($estado == "0"){
                                                          ?>
                                                            <option selected ="selected" value="0">Inactivo</option>
                                                            <option  value="1">Activo</option>
                                                          <?php   }else{ 
                                                                if($estado == "1"){?>
                                                                    <option  value="0">Inactivo</option>
                                                                    <option selected = "selected" value="1">Activo</option>
                                                            <?php    }
                                                            }
                                                             
                                                           
				                           ?> 
                                            
								</select>
            </div>
            
            
            
            
        </fieldset>
  </form>