<?php

include_once '../controlador/Sistema.php';
include_once '../controlador/Rodal.php';

$id = $_POST['idrodal'];

$control = Sistema::getInstancia();

$control->eliminarRodal($id);



?>
