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
                </tr>
            </thead>
            <tbody id="tbody">
                <?PHP
                foreach ($floras as $flora) {
                    echo "<tr>";
                    echo "<td ><img onclick='javascript:this.width=450;this.height=338'  ondblclick='javascript:this.width=135;this.height=120' "
                    . "src = '". $flora->getRutaImagen()  . "' width='135px' height='120px'></td>";
                    echo "<td>" . utf8_encode($flora->getNombreFlora()) . "</td>";
                    echo "<td>" . utf8_encode($flora->getEspecie())     . "</td>";
                    echo "<td>" . utf8_encode($flora->getDescripcion()) . "</td>";                    
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>    
</div>
