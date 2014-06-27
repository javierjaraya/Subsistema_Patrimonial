
<?php
include_once '../controlador/Sistema.php';
include_once '../controlador/Inventario.php';


$idRodal = $_POST['idrodal'];


$control = Sistema::getInstancia();

$inventario = $control->getInventarios($idRodal);

?>
<div class="row">
    <div class="col-lg-2">
        
    </div>
    <div class="col-lg-10">
        <form action="inventarioReportes.php" target="_blank" name="form "method="POST" class="form-horizontal" role="form">
                        
                           <div class="col-lg-3">
                                <input type="date" title="Seleccione la Fecha de Inicio de la Medición" class="form-control" id="fechaInicio" name="fechaInicio" required>
                            </div>
                            <div class="col-lg-3">
                                <input type="date" title="Seleccione la Fecha de Fin de la Medición" class="form-control" id="fechaFin" name="fechaFin" required>
                            </div>
                            <input type="hidden" value =<?php echo $idRodal ?> id="idRodal" name="idRodal">
                        
                        <div class="form-group">
                            <div class="col-lg-2"><input type="submit" class='btn btn-danger' onclick=" return validarFechas()" title="Generar un PDF entre las fechas seleccionadas" value='Generar PDF'> </div>
                        </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="panel panel-default">
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
                <th >Fecha<i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Acción</th>
               
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
                echo "<td>";
                echo "<button type='button' onclick='inventario.modificarInventario(".$row['ID_INVENTARIO'].",".$row['ID_RODAL'].")' class='btn btn-warning glyphicon glyphicon-pencil' title='Editar Inventario'></button>";
                echo "<button type='button' onclick='inventario.eliminarInventario(".$row['ID_INVENTARIO'].",".$row['ID_RODAL'].")' class='btn btn-danger glyphicon glyphicon-trash'  title='Eliminar Inventario'></button>";
                
                echo "</td>";
                
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>


    </div>
</div>
 

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
 <script type="text/javascript" src="../assets/js/inventario.js"></script>
 