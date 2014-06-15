<?php
/*
 * Archivo el cual buscará los predios según aproximaciones
 */
include_once '../controlador/Sistema.php';
include_once '../controlador/Comuna.php';
$control = Sistema::getInstancia();
if(isset( $_GET['term'])){
     $nombre = $_GET['term'];
    
    echo json_encode($control->getComunaLike($nombre));
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
