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
    <h1>Lista de Predios  <button type="button" class="btn btn-primary btn-lg" id="agregarContacto">Nuevo</button></h1>
</div>
<div class="row">
    <table id="tabla_contactos" class='table table-bordered table-hover table-striped tablesorter'>
        <thead>
            <tr>
                <th class="header">ID Predio <i class='fa fa-sort'></i></th>
                <th class="header">Nombre Predio<i class='fa fa-sort'></i></th>
                <th class="header">Estado <i class='fa fa-sort'></i></th>
                <th class="header">Valor Comercial <i class='fa fa-sort'></i></th>
                <th class="header">Accion</th>
            </tr>
        </thead>
        <tbody id="tbody">
            <?PHP
            foreach($predios as $predio){
                echo "<tr>";
                echo "<td>".$predio->getIdPredio()."</td>";
                echo "<td>".$predio->getNombre()."</td>";
                echo "<td>".$predio->getEstado()."</td>";
                echo "<td>".$predio->getValorComercial()."</td>";
                echo "<td>";
                echo "<button type='button' class='btn btn-warning'>Modificar</button>";
                echo "<button type='button' class='btn btn-danger'>Eliminar</button>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>