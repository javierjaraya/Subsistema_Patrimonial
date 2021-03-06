<?php
/*
 * Vista de tabla contenedora de predio
 */

include_once '../controlador/Sistema.php';
include_once '../controlador/Predio.php';

$control = Sistema::getInstancia();
$predios = $control->findAllRodales();
?>
<div class="row">
    <div class="col-lg-9">
        <h1>Lista de Rodales <h1>
    </div>
    <div class="col-lg-3">
        
     <form action="rodalReportes.php" target="_blank" name="form "method="GET" class="form-horizontal" role="form">
         
         <select id="seleccionFiltro" name="seleccionFiltro" size="1">
				    <option value="-1">Ordenar por...</option>
				    <option value="0">Año Plantación</option>
			           |<option value="1">Id Predio</option>
                                    <option value="2">Id Rodal</option>
                                    <option value="3">Nombre Predio</option>
                                    <option value="4">Superficie</option>
                                    <option value="5">Zona Crecimiento</option>
                             </select>
         <select id="seleccionCantidad" name="seleccionCantidad" size="1" title="Cantidad de Resultados">
				    <option value="101">*</option>
				    <option value="10">10</option>
			            <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    
                             </select>
         <input type="text" id="idprediofiltroRodal" name="idprediofiltroRodal" value="" placeholder="Filtre por ID Predio">
        <button type="submit" class='btn btn-success glyphicon glyphicon-floppy-save' title="Generar reporte" onclick=" return validarSeleccionReporteRodal()" ></button>
         
     </form>
             
    </div>
    </div>
<div class="row">
    <div class="panel panel-default">
						
    <table cellpadding="0" cellspacing="0" border="0" id="tabla_contactos" class="table table-striped table-bordered bootstrap-datatable dataTable">
        <thead>
            <tr>
                <th >ID Predio <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Nombre Predio <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th id="columna_rodal">ID Rodal <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Manejo <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Esp. Arbórea <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Zona Crecimiento <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Sup. (ha) <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Año Plantación <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Valor Comercial ($) <i class='fa fa-sort' style="cursor:hand"></i></th>
                <th >Acción</th>
            </tr>
        </thead>
        <tbody id="tbody">
            <?PHP
            while($row =  oci_fetch_array($predios,OCI_RETURN_NULLS)){
                echo "<tr>";
                echo "<td class='text-right'>".$row['ID_PREDIO']."</td>";
                echo "<td>".$row['NOMBRE']."</td>";
                echo "<td class='text-right'>".$row['ID_RODAL']."</td>";
                echo "<td >".$row['MANEJO']."</td>";
                echo "<td >".$row['ARBOREA']."</td>";
                echo "<td >".$row['ZONA']."</td>";
                echo "<td class='text-right'>".$row['SUP']."</td>";
                echo "<td class='text-right'>".$row['ANIO']."</td>";
                echo "<td class='text-right'>".number_format($row['VALOR'])."</td>";
                echo "<td>";
                echo "<button type='button' onclick='rodal.modificarRodal(".$row['ID_RODAL'].")' class='btn btn-warning glyphicon glyphicon-pencil' title='Editar Rodal'></button>";
                echo "<button type='button' onclick='rodal.eliminarRodal(".$row['ID_RODAL'].")' class='btn btn-danger glyphicon glyphicon-trash'  title='Eliminar Rodal'></button>";
                echo "<button type='button' onclick='rodal.cargarListaInventario(".$row['ID_RODAL'].")' class='btn btn-info glyphicon glyphicon-list-alt'  title='Ver Inventarios'></button>";
                echo "<button type='button' onclick='inventario.ingresaNuevoInventario(".$row['ID_RODAL'].")' class='btn btn-primary glyphicon glyphicon-plus-sign'  title='Agregar Inventario'></button>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
    
<div id="nuevoInventario"  class="ui-front"style="display:none; cursor: default" > 
        <fieldset>
            
            <div><label>Servicio: </label>&nbsp;&nbsp;<img id="id_servicio_check" src="" style="display: none;"><input type="text" class="servicio form-control" name="servicio" ok="false"/></div>
            <div><label>Sistema Inventario: </label><input type="text" class="sistemaInventario form-control" name="sistemaInventario" required="required"/></div>
            <div><label>Diámetro Medio (m): </label><input type="number" class="diametroMedio form-control" name="diametroMedio" required="required"/></div>
            <div><label>Altura Dominante (m): </label><input type="number" class="alturaDominante form-control" name="alturaDominante" required="required"/></div>
            <div><label>Área Basal (m2): </label><input type="number" class="areaBasal form-control" name="areaBasal" required="required"/></div>
            <div><label>Volumen (m3): </label><input type="number" class="volumen form-control" name="volumen" required="required"/></div>
            <div><label>Número de Árboles: </label><input type="number" class="numeroArboles form-control" name="numeroArboles" required="required"/></div>
            <div><label>Altura (m): </label><input type="number" class="altura form-control" name="altura" required="required"/></div>
            <div><label>Fecha Medición: </label><input type="date" class="fecha form-control" name="fecha" required="required"/></div>
            
            
        </fieldset>
 
</div> 
    
<div  style="display:none; cursor: default"> 
           <div id="listaInventarioDialog" title="Create new user">
        
</div>
    
<div id="editInventarioDialog" title="Create new user">
        
</div>
    
     <div id="editRodalDialog" title="Create new user">
        
</div>
    
    
<div class="notify_correct" style="display:none">
     <h1>Predio Agregado</h1>
     <h2>Correctamente!</h2>
</div>
</div> 

