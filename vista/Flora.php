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
                    <th >ID Camino <i class='fa fa-sort' style="cursor:hand"></i></th>
                    <th >Nombre <i class='fa fa-sort' style="cursor:hand"></i></th>
                    <th >Especie <i class='fa fa-sort' style="cursor:hand"></i></th>
                    <th >Descripcion <i class='fa fa-sort' style="cursor:hand"></i></th>
                </tr>
            </thead>
            <tbody id="tbody">
                <?PHP
                foreach ($floras as $flora) {
                    echo "<tr>";
                    echo "<td ><img src = '". $flora->getRutaImagen()  . "' width='135px' height='120px'></td>";
                    echo "<td>" . $flora->getNombreFlora() . " m</td>";
                    echo "<td>" . $flora->getEspecie()     . "</td>";
                    echo "<td>" . $flora->getDescripcion() . "</td>";                    
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>    
</div>
