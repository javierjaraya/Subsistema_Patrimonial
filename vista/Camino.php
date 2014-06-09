<?php
/*
 * Vista de tabla contenedora de camino
 */

include_once '../controlador/Sistema.php';
include_once '../controlador/Camino.php';

$control = Sistema::getInstancia();
$caminos = $control->findAllCaminos();
?>
<div class="row">
    <h1>Lista de Caminos</h1>
</div>
<div class="row">
    <div class="panel panel-default">
						
    <table cellpadding="0" cellspacing="0" border="0" id="tabla_contactos" class="table table-striped table-bordered bootstrap-datatable dataTable">
        <thead>
            <tr>
                <th >ID Camino <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Longitud <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Tipo Superficie <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >ID Predio <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Accion</th>
            </tr>
        </thead>
        <tbody id="tbody">
            <?PHP
            foreach($caminos as $camino){
                echo "<tr>";
                echo "<td >".$camino->getIdCamino()."</td>";
                echo "<td>".$camino->getLongitud()."</td>";
                echo "<td>".$camino->getTipoSuperficie()."</td>";
                echo "<td>".$camino->getIdPredio()."</td>";
                echo "<td>";
                echo "<button type='button' onclick='' class='btn btn-warning'>Modificar</button>";
                echo "<button type='button' class='btn btn-danger'>Eliminar</button>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
    
<div  style="display:none; cursor: default"> 
           <div id="editPredioDialog" title="Create new user">
        
    </div>
</div> 

