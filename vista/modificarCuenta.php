<?php
include_once '../controlador/Sistema.php';
include_once '../controlador/Cuenta.php';


$idCuenta = $_POST['idCuenta'];
//echo $idCuenta;
$control = Sistema::getInstancia();
$cuenta = $control->findCuentaById($idCuenta);

$fechaCreacion = $cuenta->getFechaCreacion();
$password = $cuenta->getPassword();
$estado = $cuenta->getEstado();
$idPerfil = $cuenta->getIdPerfil();
$idOriginal = $idCuenta;

?>
<form>
<fieldset>  
            <input type="hidden" <?php echo "value=$idOriginal" ?> id="idOriginal" />
            <div><label>ID: </label><input class="form-control" type="text" id="idCuenta" name="idCuenta" <?php echo "value='$idCuenta'"?> /></div>
            <div><label>Fecha Creacion: </label><input type="text" class="text ui-widget-content ui-corner-all form-control" id="fechaCreacion" <?php echo "value='$fechaCreacion'"?> /></div>
            <div><label>Password: </label><input class="form-control" type="text" id="password" name="password" <?php echo "value='$password'"?> /></div>

            <div><label>ID Perfil: </label><input class="form-control" id="idPerfil" name="idPerfil" <?php echo "value='$idPerfil'"?> /></div>

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