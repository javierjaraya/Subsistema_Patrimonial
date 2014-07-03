<?php

include_once '../controlador/Sistema.php';
include_once '../controlador/CarpetaLegal.php';

$codigo = $_POST['Codigo'];
$control = Sistema::getInstancia();
$control->eliminarCarpeta($codigo);


?>