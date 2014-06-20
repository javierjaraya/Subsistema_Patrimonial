<?php
include_once '../controlador/Sistema.php';
include_once '../controlador/Predio.php';


$idpredio = $_POST['idpredio'];

$control = Sistema::getInstancia();

$predio = $control->findPredioById($idpredio);


$nombrePredio = $predio->getNombre();

$superficiePredio = $predio->getSuperficie();
$valorComercialPredio = $predio->getValorComercial();
$estado = $predio->getEstado();



$idComuna = $predio->getIdComuna();

//$zona = $control->getZonaById($idZona);
//$nombreZona = $zona->getNombre();

$comuna = $control->getComunaById($idComuna);
$nombreComuna = $comuna->getNombreComuna();



$idOriginal = $idpredio;



?>
<form>
<fieldset>
            <div><label>Identificador Predio: </label><input class="form-control" type="text" id="idpredio" name="idpredio" <?php echo "value='$idpredio'"?> /></div>
            <div><label>Nombre: </label><input type="text" class="text ui-widget-content ui-corner-all form-control" id="nombre" <?php echo "value='$nombrePredio'"?> /></div>
            <div><label>Superficie: </label><input class="form-control" type="text" id="superficie" name="superficie" <?php echo "value='$superficiePredio'"?> /></div>
            <div><label>Valor Comercial:</label><input class="form-control" cols="30" rows="5" id="valorcomercial" name="valorcomercial" <?php echo "value='$valorComercialPredio'"?> /></div>
            
            <div><label>Comuna: </label><input class="form-control" cols="30" rows="5" id="comuna" name="comuna" <?php echo "value='$nombreComuna'"?> /></div>
            <input type="hidden" <?php echo "value=$idOriginal" ?> id="idOriginal" />
            <div><label>Estado: </label><select id="estado" name="estado" class="form-control input-sm" size="1">
				   <option value="-1">Estado Predio </option>
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