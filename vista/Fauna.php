<?php
/**
 * Description of Fauna
 *
 * @author Javier
 */
include_once '../controlador/Sistema.php';
include_once '../controlador/Fauna.php';

$control = Sistema::getInstancia();
$faunas = $control->findAllFaunas();

?>

<div class="row">
    <h1>Lista de Fauna</h1>
    <form action="" method="POST">Filtrar por codigo predio<input type="text" name="" value=""><input type="submit" name="Buscar" value="Buscar"></form>
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
                foreach ($faunas as $fauna) {
                    echo "<tr>";
                    echo "<td ><img src = '". $fauna->getRutaImagen()  . "' width='135px' height='120px'></td>";
                    echo "<td>" . $fauna->getNombreFauna() . " m</td>";
                    echo "<td>" . $fauna->getEspecie()     . "</td>";
                    echo "<td>" . $fauna->getDescripcion() . "</td>";                    
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>    
</div>
