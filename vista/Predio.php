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
    <h1>Lista de Predios  <button type="button" class="btn btn-primary btn-lg" id="agregarContacto" onClick="eventos.ingresaNuevoPredio()">Nuevo</button></h1>
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

<div id="nuevoPredio" style="display:none; cursor: default"> 
        <fieldset>
            <div><label>Identificador Predio: </label><input type="text" class="idpredio" name="idpredio" /></div>
            <div><label>Nombre: </label><input type="text" class="nombre" name="nombre" /></div>
            <div><label>Superficie: </label><input type="text" class="superficie" name="superficie" /></div>
            <div><label>Valor Comercial:</label><input cols="30" rows="5" class="valorcomercial" name="valorcomercial" /></div>
            <div><label>Zona: </label><input cols="30" rows="5" class="zona" name="zona" ></input></div>
            <div><label>Comuna: </label><input cols="30" rows="5" class="comuna" name="comuna" /></div>
            <div class="ultimo">
                <img src="assets/ico/ajax.gif" class="ajaxgif hide" />
                <div class="msg"></div>
                <button  onclick="eventos.aceptarIngresoPredio()">Enviar Mensaje</button>
            </div>
        </fieldset>
 
</div> 