<?php

include_once '../controlador/Sistema.php';
include_once '../controlador/Predio.php';

$id = $_POST['idpredio'];

$control = Sistema::getInstancia();

$control->eliminarPredio($id);



?>
