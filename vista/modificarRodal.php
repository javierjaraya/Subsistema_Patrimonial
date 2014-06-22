<?php

include_once '../controlador/Sistema.php';
include_once '../controlador/Rodal.php';

$idrodal = $_POST['idrodal'];

$control = Sistema::getInstancia();

$rodal = $control->findRodalById($idrodal);

$idpredio = $rodal->getIdPredio();
$idrodal = $rodal->getIdRodal();
$anioPlantacion = $rodal->getAnioPlantacion();
$superficie = $rodal->getSuperficie();
$valorComercial = $rodal->getValorComercial();
$idespecieArborea = $rodal->getIdEspecieArborea();

$listaEspecieArborea = $control->getEspeciesArborea();



$manejo = $rodal->getManejo();
$zonaCrecimiento = $rodal->getZonaCrecimiento();
$estado = $rodal->getEstado();



?>
<form>
<fieldset>
            <div><label>Identificador Predio: </label><input class="form-control" type="text" id="idpredio" name="idpredio" <?php echo "value='$idpredio'"?> readonly/></div>
            <div><label>Identificador Rodal: </label><input class="form-control" type="text" id="idrodal" name="idrodal" <?php echo "value='$idrodal'"?> /></div>
            <div><label>Año Plantación: </label><input type="text" class="text ui-widget-content ui-corner-all form-control" id="anioPlantacion" <?php echo "value='$anioPlantacion'"?> /></div>
            <div><label>Superficie: </label><input type="text" class="text ui-widget-content ui-corner-all form-control" id="superficie" <?php echo "value='$superficie'"?> /></div>
            <div><label>Valor Comercial: </label><input type="text" class="text ui-widget-content ui-corner-all form-control" id="valorComercial" <?php echo "value='$valorComercial'"?> /></div>
            <div><label>Especie Arborea: </label>
            <select id="tEquip" name="id_tipo_equip" required>
              <option class="span2"> Ingrese Tipo</option>
              <?php
                while($row = oci_fetch_array ($listaEspecieArborea,OCI_RETURN_NULLS )){
                    if($row['ID_ESPECIE_ARBOREA'] == $idespecieArborea){
                        echo "<option selected='selected' value='".$row['ID_ESPECIE_ARBOREA']."' >".$row['NOMBRE_ESPECIE_ARBOREA']."</option>\n";
                    }else{
                        echo "<option value='".$row['ID_ESPECIE_ARBOREA']."' >".$row['NOMBRE_ESPECIE_ARBOREA']."</option>\n";
                    }
                    
                }
            
        ?>
        </select>
            <div><label>Manejo: </label><input type="text" class="text ui-widget-content ui-corner-all form-control" id="manejo" <?php echo "value='$manejo'"?> /></div>
            <div><label>Zona Crecimiento: </label><input type="text" class="text ui-widget-content ui-corner-all form-control" id="zonaCrecimiento" <?php echo "value='$zonaCrecimiento'"?> /></div>
      
            <div><label>Estado: </label><select id="estado" name="estado" class="form-control input-sm" size="1">
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