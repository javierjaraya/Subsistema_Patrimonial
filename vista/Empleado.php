<?php

/*
 * Vista de tabla contenedora de empleados
 */

include_once '../controlador/Sistema.php';
include_once '../controlador/Empleado.php';

$control = Sistema::getInstancia();
$empleados = $control->findAllEmpleados();
?>
<div class="row">
    <h1>Lista de Empleados  <button type="button" class="btn btn-primary btn-lg" id="agregarContacto">Nuevo</button></h1>
</div>
<div class="row">
    <div class="panel panel-default">
						
    <table cellpadding="0" cellspacing="0" border="0" id="tabla_contactos" class="table table-striped table-bordered bootstrap-datatable dataTable">
        <thead>
            <tr>
                <th >DNI </th>
                <th >Nombre </th>
                <th >Apellido Paterno </th>
                <th >Apellido Materno </th>
                <th >Ingreso</th>
                
            </tr>
        </thead>
        <tbody id="tbody">
            <?PHP
            foreach($empleados as $empleado){
                echo "<tr>";
                echo "<td>".$empleado->getDni()."</td>";
                echo "<td>".$empleado->getNombreEmpleado()."</td>";
                echo "<td>".$empleado->getApPaternoEmpleado()."</td>";
                echo "<td>".$empleado->getApMaternoEmpleado()."</td>";
                echo "<td>".$empleado->getFechaIngreso()."</td>";
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
