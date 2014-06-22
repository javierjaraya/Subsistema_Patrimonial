<?php
include_once '../controlador/Sistema.php';
include_once '../controlador/Cuenta.php';


$idCuenta = $_POST['idCuenta'];

$control = Sistema::getInstancia();

$cuenta = $control->getCuenta($dni);


$fechaCreacion = $cuenta->getFechaCreacion();
$password = $cuenta->getPassword();
$estado = $cuenta->getEstado();
$idPerfil = $cuenta->getIdPerfil();
$idOriginal = $idCuenta;



?>
<form>
<fieldset>
            <div><label>ID: </label><input class="form-control" type="text" id="idcuenta" name="idcuenta" <?php echo "value='$idCuenta'"?> /></div>
            <div><label>Fecha Creacion: </label><input type="text" class="text ui-widget-content ui-corner-all form-control" id="fechaCreacion" <?php echo "value='$fechaCreacion'"?> /></div>
            <div><label>Password: </label><input class="form-control" type="text" id="password" name="password" <?php echo "value='$password'"?> /></div>

            <div><label>ID Perfil: </label><input class="form-control" cols="30" rows="5" id="idperfil" name="idperfil" <?php echo "value='$idPerfil'"?> /></div>
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