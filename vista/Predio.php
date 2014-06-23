 <?php
/*
 * Vista de tabla contenedora de predio
 */

include_once '../controlador/Sistema.php';
include_once '../controlador/Predio.php';
include_once '../controlador/Comuna.php';
$control = Sistema::getInstancia();
$predios = $control->findAllPredios();
$zonas = $control->findAllZonas();
?>
<div class="row">
    <h1>Lista de Predios  <button type="button" class='btn btn-primary glyphicon glyphicon-plus' id="agregarContacto" onClick="predio.ingresaNuevoPredio()"></button><button type="button" class='btn btn-success glyphicon glyphicon-floppy-save' style="float:right;" id="agregarContacto" onClick="javascript:window.open('predioReportes.php','','width=700,height=600,left=150,top=50,toolbar=yes');void 0"></button></h1>
</div>
<div class="row">
    <div class="panel panel-default">
						
    <table cellpadding="0" cellspacing="0" border="0" id="tabla_contactos" class="table table-striped table-bordered bootstrap-datatable dataTable">
        <thead>
            <tr>
                <th >ID Predio <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Nombre Predio <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Comuna <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Superficie (HA) <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Valor Comercial ($) <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Acción</th>
            </tr>
        </thead>
        <tbody id="tbody">
            <?PHP
            foreach($predios as $predio){
                $comuna = $predio->getComuna();
                echo "<tr>";
                echo "<td >".$predio->getIdPredio()."</td>";
                echo "<td>".$predio->getNombre()."</td>";
                echo "<td>".$comuna->getNombreComuna()."</td>";
                echo "<td class='text-right'>".$predio->getSuperficie()."</td>";
                echo "<td class='text-right'>".number_format($predio->getValorComercial())."</td>";
                echo "<td>";
                echo "<button type='button' onclick='predio.modificarPredio(".$predio->getIdPredio().")' class='btn btn-warning glyphicon glyphicon-pencil'></button>";
                echo "<button type='button' onclick='predio.eliminarPredio(".$predio->getIdPredio().")' class='btn btn-danger glyphicon glyphicon-trash'  ></button>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
    
<div id="nuevoPredio"  class="ui-front"style="display:none; cursor: default" > 
        <fieldset>
            <div><label>Identificador Predio: </label>&nbsp;&nbsp;<img id="id_predio_check" src="" style="display: none;"><input type="number" class="idpredio form-control" name="idpredio" ok="false"/></div>
            <div><label>Nombre: </label><input type="text" class="nombre form-control" name="nombre" required="required"/></div>
            <div class="ui-widget"><label>Comuna: </label>&nbsp;&nbsp;<img id="comuna_check" src="" style="display: none;"><input cols="30" rows="5" name="comuna" id="comuna" class="id_comuna form-control" idcomuna="" required="required" ok="false"></div>
            <div><label>Superficie: </label><input type="number" class="superficie form-control" name="superficie" required="required" /></div>
            <div><label>Valor Comercial:</label><input type="number" cols="30" rows="5" class="valorcomercial form-control" name="valorcomercial" required="required"/></div>
            <div><label>Zona: </label><select id="zona_agregar" name="zona" class="form-control input-sm" size="1">
				                          <?php 
                                                            foreach($zonas as $zona){
                                                          ?>
            
                                                            <option  value="<?php echo $zona->getIdZona();?>"><?php echo $zona->getNombre();?></option>
                         
                                                            <?php    
                                                            }
                       
				                           ?> 
                                            
								</select>
            </div>
            
        </fieldset>
 
</div> 
    
<div   style="display:none; cursor: default"> 
           <div id="editPredioDialog" class="ui-front" title="Create new user">
        
</div>
    
<div class="notify_correct" style="display:none">
     <h1>Predio Agregado</h1>
     <h2>Correctamente!</h2>
</div>
</div> 

