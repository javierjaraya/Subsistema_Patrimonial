<?php

include_once '../controlador/Sistema.php';
include_once '../controlador/Camino.php';

$id = $_POST['idcamino'];

$control = Sistema::getInstancia();
echo "idcamino = ".$id;
$control->eliminarCamino($id);



?>
