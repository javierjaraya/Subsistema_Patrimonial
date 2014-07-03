<?php

/*
 * Vista de tabla contenedora de empleados
 */

include_once '../controlador/Sistema.php';
include_once '../controlador/Empleado.php';
include_once '../controlador/Cuenta.php';

$control = Sistema::getInstancia();
$empleados = $control->findAllEmpleados();
?>
<div class="row">
    <h1>Lista de Empleados </h1>
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
                <th >Ingreso </th>
                <th >Accion</th>
                
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
                echo "<button type='button' class='btn btn-warning glyphicon glyphicon-pencil'></button>";
                echo "<button type='button' class='btn btn-danger glyphicon glyphicon-trash'></button>";
                if($empleado->getIdCuenta()==null){
                echo "<button type='button' class='btn btn-primary glyphicon glyphicon-plus' onClick='cuenta.ingresaNuevaCuenta(".$empleado->getDni().")'>&nbsp;Cuenta</button>";
                }else{
                    echo "<button type='button' class='btn btn-success glyphicon glyphicon-search'>&nbsp;Cuenta</button>";
                }
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<!--<div id="nuevoEmpleado" style="display:none; cursor: default"> 
        <fieldset>
            <div><label>DNI: </label><input type="text" class="dni" name="dni" /></div>
            <div><label>Nombre: </label><input type="text" class="nombre" name="nombre" /></div>
            <div><label>Apellido Paterno: </label><input type="text" class="apPaterno" name="apPaterno" /></div>
            <div><label>Apellido Materno: </label><input type="text" class="apMaterno" name="apMaterno" /></div>
            <div><label>Fecha de Ingreso: </label><input cols="30" rows="5" class="fechaIngreso" name="fechaIngreso" ></input></div>
            <div><label>ID Cargo: </label><input cols="30" rows="5" class="idCargo" name="idCargo" /></div>
            <div><label>ID Cuenta: </label><input cols="30" rows="5" class="idCuenta" name="idCuenta" /></div>
            <div class="accion">
                <div class="msg"></div>
                <button  type="button" onclick="empleado.aceptarIngresoEmpleado()">Aceptar</button>
                <button  type="button" onclick="">Cancelar</button>
            </div>
        </fieldset>
</div>-->
    
<div id="nuevaCuenta" style="display:none; cursor: default"> 
        <fieldset>
            <div><label>ID Cuenta: </label><input type="text" class="idCuenta" name="idCuenta" /></div>
            <div><label>Fecha de Creacion: </label><input type="text" class="fechaCreacion" name="fechaCreacion" /></div>
            <div><label>Password: </label><input type="text" class="password" name="password" /></div>
            <div><label>Estado: </label><input type="text" class="estado" name="estado" /></div>
            <div><label>ID Perfil: </label><input cols="30" rows="5" class="idPerfil" name="idPerfil" /></div>            
        </fieldset>
</div>     
