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
                    <th >Nombre Predio <i class='fa fa-sort' style="cursor:hand"></i></th>
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
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</div>
