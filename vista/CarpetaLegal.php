<?php
/*
 * Vista de tabla contenedora de carpetas
 */

include_once '../controlador/Sistema.php';
include_once '../controlador/CarpetaLegal.php';

$control = Sistema::getInstancia();
$carpetas = $control->findAllCarpetas();


?>
<div class="row">
    <h1>Carpetas <button type="button" class='btn btn-primary glyphicon glyphicon-plus' id="agregarContacto" onclick="carpeta.ingresaNuevaCarpeta()"></button></h1>
</div>
<div class="row">
    <div class="panel panel-default">
						
    <table cellpadding="0" cellspacing="0" border="0" id="tabla_contactos" class="table table-striped table-bordered bootstrap-datatable dataTable">
        <thead>
            <tr>
                <th >Codigo </th>
                <th >Predio</th>
                <th >Fecha Inscripcion</th>
                <th >Contribucion </th>
                <th >Rol </th>
                <th >Conservador Bien Raiz</th>
                <th >ID_Predio</th>
                <th>Accion</th>
                
            </tr>
        </thead>
        <tbody id="tbody">
            <?PHP
              foreach($carpetas as $carpeta){
                if($carpeta->getEstado()==1){
                echo "<tr>";
                echo "<td>".$carpeta->getCodigo()."</td>";
                echo "<td>".$carpeta->getNombrePredio()."</td>";
                echo "<td>".$carpeta->getFechaInscripcion()."</td>";
                echo "<td>".$carpeta->getContribucion()."</td>";
                echo "<td>".$carpeta->getRol()."</td>";
                echo "<td>".$carpeta->getNombreConservador()."</td>";
                echo "<td>".$carpeta->getIdPredio()."</td>";
                echo "<td>";              
                echo "<button type='button' class='btn btn-warning glyphicon glyphicon-pencil' onclick='carpeta.modificarCarpeta(".$carpeta->getCodigo().")'></button>";
                echo "<button type='button' class='btn btn-danger glyphicon glyphicon-trash' onclick='carpeta.eliminarCarpeta(".$carpeta->getCodigo().")'></button>";
                echo "</td>";
                echo "</tr>";             
                }
            }
            ?>
        </tbody>
    </table>
</div>

<div id="nuevaCarpeta" style="display:none; cursor: default"> 
        <fieldset>
            <div><label>Codigo: </label><input type="text" class="form-control" name="codigo" id="codigo_carpeta" /></div>
            <div><label>Fecha de Inscripcion: </label><input type="date" class="form-control" name="fechaInscripcion" id="fecha_carpeta"/></div>
            <div><label>Rol: </label><input type="text" class="form-control" name="rol" id="rol_carpeta" /></div>
            <div><label>Conservador: </label><input type="text" class="form-control" name="conservador" id="conservador_carpeta"/></div>
            <div><label>Contribucion: </label><input type="text" class="form-control" name="contribucion" id="contribucion_carpeta" /></div>
            <div><label>ID Predio: </label><input cols="30" rows="5" class="form-control" name="idPredio" id="id_predio_carpeta"/></div>
            <div><input type="hidden" class="form-control" name="estado" value="1" visible="false" id="estado_carpeta"/></div>             
        </fieldset>
</div>
    
<div  style="display:none; cursor: default"> 
           <div id="editCarpetaDialog" title="Create new user">
        
</div>
