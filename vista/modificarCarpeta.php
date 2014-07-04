<?php
include_once '../controlador/Sistema.php';
include_once '../controlador/CarpetaLegal.php';


$codigo = $_POST['Codigo'];
$control = Sistema::getInstancia();
$carpeta = $control->findCarpetaById($codigo);
//echo $codigo;

$fechaInscripcion = $carpeta->getFechaInscripcion();
$rol = $carpeta->getRol();
$contribucion = $carpeta->getContribucion();
$conservador = $carpeta->getConservadorBienRaiz();
$idPredio = $carpeta->getIdPredio();
$estado = $carpeta->getEstado();
$idOriginal = $codigo;

?>
<form>
<fieldset>  
            <input type="hidden" <?php echo "value=$idOriginal" ?> id="idOriginal" />
            <div><label>Codigo: </label><input class="form-control" type="text" id="codigo" name="codigo" <?php echo "value='$codigo'"?> /></div>
            <div><label>Fecha Inscripcion: </label><input type="text" class="form-control" name="fechaInscripcion" <?php echo "value='$fechaInscripcion'"?> /></div>
            <div><label>Rol: </label><input class="form-control" type="text" id="rol" name="rol" <?php echo "value='$rol'"?> /></div>
            <div><label>Conservador: </label><input class="form-control" id="conservador" name="conservador" <?php echo "value='$conservador'"?> /></div>
            <div><label>Contribucion: </label><input class="form-control" id="contribucion" name="contribucion" <?php echo "value='$contribucion'"?> /></div>
            <div><label>ID Predio: </label><input class="form-control" id="idPredio" name="idPredio" <?php echo "value='$idPredio'"?> /></div>
            <div><label>Estado: </label><select id="estado" name="estado" class="form-control input-sm" size="1">
				   <option value="-1">Estado Cuenta </option>
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