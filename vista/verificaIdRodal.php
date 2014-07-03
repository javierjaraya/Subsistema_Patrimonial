<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../controlador/Sistema.php';
include_once '../controlador/Rodal.php';
$idrodal = $_POST['idrodal'];
try{
$control = Sistema::getInstancia();
$rodal = $control->findRodalById($idrodal);
$return = array();
if($rodal->getIdRodal() ==""){
    //el id predio no es utilizado
    $return['error'] = 1;
}else{
    $return['error'] = 0;
}

echo json_encode($return);
}catch(Exception $e){
    echo "error";
}

?>
