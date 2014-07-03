<?php
include_once '../controlador/Sistema.php';
include_once '../controlador/Predio.php';
$control = Sistema::getInstancia();
if(isset( $_GET['term'])){
     $id = $_GET['term'];
     $predio = new Predio();
     $predio->setIdPredio($id);
     echo json_encode($control->findPredioLikeId($id));

}else{
    $comuna = new Comuna();
    $nombreComuna = $_POST['nombreComuna'];
    $comuna->setNombreComuna($nombreComuna);
    $comunas = $control->findComunaByExample($comuna);
    if(empty($comunas)){
        $aux['error'] = "0";
        echo json_encode($aux);
    }
    foreach($comunas as $comuna){
        $aux['id'] = utf8_encode($comuna->getIdComuna());
        $aux['nombre'] = utf8_encode($comuna->getNombreComuna());
        $aux['error'] = "1";
        $json = json_encode($aux);
        echo $json;
    }
}
?>
