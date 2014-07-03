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
    <h1>Lista de Caminos <button type='button' class='btn btn-primary glyphicon glyphicon-plus' onClick="camino.ingresaNuevoCamino()"></button></h1>
</div>
<div class="row">
    <div class="panel panel-default">

        <table cellpadding="0" cellspacing="0" border="0" id="tabla_contactos" class="table table-striped table-bordered bootstrap-datatable dataTable">
            <thead>
                <tr>
                    <th >ID Camino <i class='fa fa-sort' style="cursor:hand"></i></th>
                    <th >Longitud <i class='fa fa-sort' style="cursor:hand"></i></th>
                    <th >Tipo Superficie <i class='fa fa-sort' style="cursor:hand"></i></th>
                    <th >Nombre Predio <i class='fa fa-sort' style="cursor:hand"></i></th>
                    <th >Accion</th>
                </tr>
            </thead>
            <tbody id="tbody">
                <?PHP
                foreach ($caminos as $camino) {
                    echo "<tr>";
                    echo "<td >" . $camino->getIdCamino() . "</td>";
                    echo "<td>" . $camino->getLongitud() . " m</td>";
                    echo "<td>" . $camino->getTipoSuperficie() . "</td>";
                    echo "<td>" . $camino->getIdPredio() . "</td>";
                    echo "<td>";
                    echo "<button type='button' onclick='camino.modificarCamino(" . $camino->getIdCamino() . ")'  class='btn btn-warning glyphicon glyphicon-pencil'></button>";
                    echo "<button type='button' onclick='camino.eliminarCamino(" . $camino->getIdCamino() . ")'class='btn btn-danger glyphicon glyphicon-trash'></button>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!--VENTA DIALOGO : AGREGAR CAMINO -->    
    <div id="nuevoCamino"  class="ui-front"style="display:none; cursor: default" > 
        <fieldset>
           <div>
               <label>Longitud: </label>
               <input type="number" class="longitud form-control" name="longitud" required="required"/>
           </div>
           <div class="ui-widget">
               <label>Tipo Superficie: </label>&nbsp;&nbsp;<img id="superficie_check" src="" style="display: none;">
               <select id="superficie" name="superficie" class="superficie form-control" size="1">
                   |<option value="1">Ripio</option>
                    <option value="2">Gravilla</option>
                    <option value="3">Arena</option>
                    <option value="4">Tierra</option>
                    <option value="5">Pavimento</option>
               </select>
           </div>
           <div>
               <label>Id Predio: </label>
               <input type="text" class="idpredio form-control" id="idpredio" name="idpredio" required="required" />
           </div>
        </fieldset>
         
    </div> 

    <div  style="display:none; cursor: default"> 
        <div id="editCaminoDialog" title="Create new user">
        </div>

        <div id="notify_correct" class="notify_correct" style="display:none">
            <h1>Camino Agregado</h1>
            <h2>Correctamente!</h2>
        </div>
    </div> 

</div>
