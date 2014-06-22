<?php
/*
 * Vista de tabla contenedora de predio
 */

include_once '../controlador/Sistema.php';
include_once '../controlador/Predio.php';

$control = Sistema::getInstancia();
$predios = $control->findAllRodales();
?>
<div class="row">
    <h1>Lista de Rodales  <button type="button" class='btn btn-primary glyphicon glyphicon-plus' id="agregarContacto" onClick="predio.ingresaNuevoPredio()"></button><button type="button" class='btn btn-success glyphicon glyphicon-floppy-save' style="float:right;" id="agregarContacto" onClick="javascript:window.open('predioReportes.php','','width=700,height=600,left=150,top=50,toolbar=yes');void 0"></button></h1>
</div>
<div class="row">
    <div class="panel panel-default">
						
    <table cellpadding="0" cellspacing="0" border="0" id="tabla_contactos" class="table table-striped table-bordered bootstrap-datatable dataTable">
        <thead>
            <tr>
                <th >ID Predio <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Nombre Predio <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >ID Rodal <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Manejo <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Zona Crecimiento <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Sup. <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Año Plantación <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Valor Comercial ($) <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th  >Acción</th>
            </tr>
        </thead>
        <tbody id="tbody">
            <?PHP
            while($row =  oci_fetch_array($predios,OCI_RETURN_NULLS)){
                echo "<tr>";
                echo "<td class='text-right'>".$row['ID_PREDIO']."</td>";
                echo "<td>".$row['NOMBRE']."</td>";
                echo "<td class='text-right'>".$row['ID_RODAL']."</td>";
                echo "<td >".$row['MANEJO']."</td>";
                echo "<td >".$row['ZONA_CRECIMIENTO']."</td>";
                echo "<td class='text-right'>".$row['SUPERFICIE']."</td>";
                echo "<td class='text-right'>".$row['ANIO_PLANTACION']."</td>";
                echo "<td class='text-right'>".$row['VALOR_COMERCIAL']."</td>";
                echo "<td>";
                echo "<button type='button'  class='btn btn-warning glyphicon glyphicon-pencil'></button>";
                echo "<button type='button' onclick='rodal.eliminarRodal(".$row['ID_RODAL'].")' class='btn btn-danger glyphicon glyphicon-trash'  ></button>";
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
            
            
        </fieldset>
 
</div> 
    
<div  style="display:none; cursor: default"> 
           <div id="editPredioDialog" title="Create new user">
        
</div>
    
<div class="notify_correct" style="display:none">
     <h1>Predio Agregado</h1>
     <h2>Correctamente!</h2>
</div>
</div> 

