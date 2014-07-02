<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of buscaSuperficie
 *
 * @author Javier
 */
include_once '../controlador/Sistema.php';
include_once '../controlador/Superficie.php';
$control = Sistema::getInstancia();
if(isset( $_GET['term'])){
     $nombre = $_GET['term'];
    
    echo json_encode($control->getComunaLike($nombre));
}else{
    $superficie = new Superficie();
    $nombreSuperficie = $_POST['nombreSuperficie'];
    $superficie->setNombreSuperficie($nombreSuperficie);
    $superficies = $control->findSuperficieByExample($superficie);
    if(empty($superficies)){
        $aux['error'] = "0";
        echo json_encode($aux);
    }
    foreach($superficies as $superficie){
        $aux['id'] = utf8_encode($superficie->getIdSuperficie());
        $aux['nombre'] = utf8_encode($superficie->getIdSuperficie());
        $aux['error'] = "1";
        $json = json_encode($aux);
        echo $json;
    }
}   
?>