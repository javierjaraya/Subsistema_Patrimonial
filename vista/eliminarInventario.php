<?php

include_once '../controlador/Sistema.php';
include_once '../controlador/Inventario.php';

$id = $_GET['idinventario'];

$control = Sistema::getInstancia();

$control->eliminarInventario($id);



?>
