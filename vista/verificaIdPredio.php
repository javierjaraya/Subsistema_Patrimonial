<?php
/**
 * archivo encargado de buscar si ya se encuentra en el sistema el id
 * de predio entregado
 */
include_once '../controlador/Sistema.php';
$idpredio = $_POST['idpredio'];

$control = Sistema::getInstancia();
$predio = $control->findPredioById($idpredio);
$return = array();
if($predio->getNombre() ==""){
    //el id predio no es utilizado
    $return['error'] = 1;
}else{
    $return['error'] = 0;
}

echo json_encode($return);


?>
