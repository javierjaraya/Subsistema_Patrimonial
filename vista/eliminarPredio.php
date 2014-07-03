<?php

include_once '../controlador/Sistema.php';
include_once '../controlador/Predio.php';
include_once '../controlador/Rodal.php';

$id = $_POST['idpredio'];


$control = Sistema::getInstancia();

$control->eliminarPredio($id);
$control->eliminarRodalesDelPredio($id);




?>
