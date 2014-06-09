<?php
/*
 * Vista de tabla contenedora de predio
 */

include_once '../controlador/Sistema.php';
include_once '../controlador/Predio.php';

$control = Sistema::getInstancia();
$predios = $control->findAllPredios();
?>
<div class="row">
    <h1>Lista de Predios  <button type="button" class="btn btn-primary btn-lg" id="agregarContacto" onClick="predio.ingresaNuevoPredio()">Nuevo</button></h1>
</div>
<div class="row">
    <div class="panel panel-default">
						
    <table cellpadding="0" cellspacing="0" border="0" id="tabla_contactos" class="table table-striped table-bordered bootstrap-datatable dataTable">
        <thead>
            <tr>
                <th >ID Predio <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Nombre Predio <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Estado <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Valor Comercial <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Accion</th>
            </tr>
        </thead>
        <tbody id="tbody">
            <?PHP
            foreach($predios as $predio){
                echo "<tr>";
                echo "<td >".$predio->getIdPredio()."</td>";
                echo "<td>".$predio->getNombre()."</td>";
                echo "<td>".$predio->getEstado()."</td>";
                echo "<td>".$predio->getValorComercial()."</td>";
                echo "<td>";
                echo "<button type='button' onclick='predio.modificarPredio(".$predio->getIdPredio().")' class='btn btn-warning'>Modificar</button>";
                echo "<button type='button' class='btn btn-danger'>Eliminar</button>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<div id="nuevoPredio"  class="ui-front" style="display:none; cursor: default"> 
        <fieldset>
            <div><label>Identificador Predio: </label><input type="text" class="idpredio" name="idpredio" /></div>
            <div><label>Nombre: </label><input type="text" class="nombre" name="nombre" /></div>
            <div class="ui-widget"><label>Comuna: </label><input cols="30" rows="5" name="comuna" id="comuna" class="id_comuna" idcomuna=""/></div>
            <div><label>Superficie: </label><input type="text" class="superficie" name="superficie" /></div>
            <div><label>Valor Comercial:</label><input cols="30" rows="5" class="valorcomercial" name="valorcomercial" /></div>
            
            
        </fieldset>
 
</div> 
    
<div  style="display:none; cursor: default"> 
           <div id="editPredioDialog" title="Create new user">
        
    </div>
</div> 

