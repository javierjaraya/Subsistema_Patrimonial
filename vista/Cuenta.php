<?php

/*
 * Vista de tabla contenedora de cuentas
 */

include_once '../controlador/Sistema.php';
include_once '../controlador/Cuenta.php';

$control = Sistema::getInstancia();
$cuentas = $control->findAllCuentas();


?>
<div class="row">
    <h1>Cuentas de Usuario <button type="button" class="btn btn-primary btn-lg" id="agregarContacto" onClick="cuenta.ingresaNuevaCuenta()">Nueva</button></h1>
</div>
<div class="row">
    <div class="panel panel-default">
						
    <table cellpadding="0" cellspacing="0" border="0" id="tabla_contactos" class="table table-striped table-bordered bootstrap-datatable dataTable">
        <thead>
            <tr>
                <th >ID </th>
                <th >Creacion </th>
                <th >Password </th>
                <th >Estado </th>
                <th >ID Perfil </th>
                <th >Accion</th>
                
            </tr>
        </thead>
        <tbody id="tbody">
            <?PHP
              foreach($cuentas as $cuenta){
                echo "<tr>";
                echo "<td>".$cuenta->getIdCuenta()."</td>";
                echo "<td>".$cuenta->getFechaCreacion()."</td>";
                echo "<td>".$cuenta->getPassword()."</td>";
                echo "<td>".$cuenta->getEstado()."</td>";
                echo "<td>".$cuenta->getIdPerfil()."</td>";
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


<div id="nuevaCuenta" style="display:none; cursor: default"> 
        <fieldset>
            <div><label>ID Cuenta: </label><input type="text" class="idCuenta" name="idCuenta" /></div>
            <div><label>Fecha de Creacion: </label><input type="text" class="fechaCreacion" name="fechaCreacion" /></div>
            <div><label>Password: </label><input type="text" class="password" name="password" /></div>
            <div><label>Estado: </label><input type="text" class="estado" name="estado" /></div>
            <div><label>ID Perfil: </label><input cols="30" rows="5" class="idPerfil" name="idPerfil" /></div>            
        </fieldset>
</div>     
