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
                    //echo "<a href='#'><i class='btn btn-warning glyphicon glyphicon-pencil'></i> Editar</a> ";
                    //echo "<a href='#'><i class='btn btn-danger glyphicon glyphicon-trash'></i> Eliminar</a>";
                    echo "<button type='button' onclick='camino.modificarCamino(" . $camino->getIdCamino() . ")'  class='btn btn-warning glyphicon glyphicon-pencil'></button>";
                    echo "<button type='button' class='btn btn-danger glyphicon glyphicon-trash'></button>";
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
            <div><label>Identificador Camino: </label>&nbsp;&nbsp;<img id="id_camino_check" src="" style="display: none;"><input type="number" class="idcamino form-control" name="idcamino" ok="false"/></div>
            <div><label>Longitud: </label><input type="number" class="nombre form-control" name="longitud" required="required"/></div>
            <div class="ui-widget"><label>Tipo Superficie: </label>&nbsp;&nbsp;<img id="superficie_check" src="" style="display: none;"><input cols="30" rows="5" name="superficie" id="comuna" class="id_superficie form-control"  required="required" ok="false"></div>
            <div><label>Nombre Predio: </label><input type="text" class="superficie form-control" name="superficie" required="required" /></div>
       </fieldset>
         
    </div> 

    <div  style="display:none; cursor: default"> 
        <div id="editCaminoDialog" title="Create new user">

        </div>

        <div class="notify_correct" style="display:none">
            <h1>Camino Agregado</h1>
            <h2>Correctamente!</h2>
        </div>
    </div> 
