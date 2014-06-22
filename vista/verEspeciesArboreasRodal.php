<?php

include_once '../controlador/Sistema.php';
include_once '../controlador/EspecieArborea.php';

$idpredio = $_POST['idpredio'];

$control = Sistema::getInstancia();

$especieArborea = $control->getEspeciesArboreas($idpredio);








?>

<table cellpadding="0" cellspacing="0" border="0" id="tabla_contactos" class="table table-striped table-bordered bootstrap-datatable dataTable">
    
</table>
