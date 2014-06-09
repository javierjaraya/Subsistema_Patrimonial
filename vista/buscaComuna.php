<?php
/*
 * Archivo el cual buscará los predios según aproximaciones
 */
include_once '../controlador/Sistema.php';

    $nombre = $_GET['term'];
    $control = Sistema::getInstancia();
    echo json_encode($control->getComunaLike($nombre));
?>
