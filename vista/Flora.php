<?php
/**
 * Description of Fauna
 *
 * @author Javier
 */
include_once '../controlador/Sistema.php';
include_once '../controlador/Flora.php';

$control = Sistema::getInstancia();
$floras = $control->findAllFloras();
?>

<div class="row">
    <div style="float:right;">    
        <form action="floraReportes.php" target="_blank" name="form "method="GET" class="form-horizontal" role="form">
            Id Predio : <input type="number" name="idprediofiltro" id="idprediofiltro" value=""> 
            <button type="submit" class='btn btn-success glyphicon glyphicon-floppy-save' title="Generar reporte"></button>
        </form>
    </div>
    <h1>Lista de Flora</h1>
</div>
<div class="row">
    <div class="panel panel-default">

        <table cellpadding="0" cellspacing="0" border="0" id="tabla_contactos" class="table table-striped table-bordered bootstrap-datatable dataTable">
            <thead>
                <tr>
                    <th >Imagen <i class='fa fa-sort' style="cursor:hand"></i></th>
                    <th >Nombre <i class='fa fa-sort' style="cursor:hand"></i></th>
                    <th >Especie <i class='fa fa-sort' style="cursor:hand"></i></th>
                    <th >Descripcion <i class='fa fa-sort' style="cursor:hand"></i></th>
                    <th >Acción <i class='fa fa-sort' style="cursor:hand"></i></th>
                </tr>
            </thead>
            <tbody id="tbody">
                <?PHP
                foreach ($floras as $flora) {
                    echo "<tr>";
                    echo "<td ><img onclick='javascript:this.width=450;this.height=338'  ondblclick='javascript:this.width=135;this.height=120' "
                    . "src = '" . $flora->getRutaImagen() . "' width='135px' height='120px'></td>";
                    echo "<td>" . utf8_encode($flora->getNombreFlora()) . "</td>";
                    echo "<td>" . utf8_encode($flora->getEspecie()) . "</td>";
                    echo "<td class='text-justify'>" . utf8_encode($flora->getDescripcion()) . "</td>";
                    echo "<td>";
                    echo "<button type='button' onclick='flora.mostrarModificar(" . $flora->getIdFlora() . ")'  class='btn btn-warning glyphicon glyphicon-pencil'></button>";
                    echo "<button type='button' onclick=''  class='btn btn-danger glyphicon glyphicon-trash'></button>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>    
    
    <!--VENTA DIALOGO : MODIFICAR FLORA -->   
    <div id="editFloraDialog" title="Modificar Flora">
        
    </div>
    
    
</div>
