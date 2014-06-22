<?php
include_once '../controlador/Sistema.php';
include_once '../controlador/Inventario.php';


$idRodal = $_POST['idrodal'];


$control = Sistema::getInstancia();

$inventario = $control->getInventarios($idRodal);

?>

<table cellpadding="0" cellspacing="0" border="0" id="tabla_inventarios" class="table table-striped table-bordered bootstrap-datatable dataTable">
        <thead>
            <tr>
                <th >ID  <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Servicio <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Sist. Inventario <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Ø Medio <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Altura Dominante <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Área Basal <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Volumen <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >N° Arboles <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Altura <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Fecha Medición <i class='fa fa-sort' style="cursor:hand"></i></th>
               
            </tr>
        </thead>
        <tbody id="tbody">
            <?PHP
            while($row =  oci_fetch_array($inventario,OCI_RETURN_NULLS)){
                echo "<tr>";
                echo "<td class='text-right'>".$row['ID_INVENTARIO']."</td>";
                echo "<td>".$row['SERVICIO']."</td>";
                echo "<td class='text-right'>".$row['SISTEMA_INVENTARIO']."</td>";
                echo "<td >".$row['DIAMETRO_MEDIO']."</td>";
                echo "<td >".$row['ALTURA_DOMINANTE']."</td>";
                echo "<td >".$row['AREA_BASAL']."</td>";
                echo "<td class='text-right'>".$row['VOLUMNE']."</td>";
                echo "<td class='text-right'>".$row['NUMERO_ARBOLES']."</td>";
                echo "<td class='text-right'>".$row['ALTURA']."</td>";
                echo "<td class='text-right'>".$row['FECHA_MEDICION']."</td>";

                
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>



 

<script type="text/javascript" >
$("#tabla_inventarios").dataTable(
                  {
		"sDom": "<'row'<'col-lg-6'l><'col-lg-6'f>r>t<'row'<'col-lg-12'i><'col-lg-12 center'p>>",
		"sPaginationType": "bootstrap",
		"oLanguage": {
			"sLengthMenu": "_MENU_ Resultados por página"
		}
	}
                  
                  );
 </script>