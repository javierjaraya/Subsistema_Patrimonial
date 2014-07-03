<?php

include_once('../controlador/PDF.php');
include_once '../controlador/Sistema.php';

//P = Vertical       L = Horizontal
$pdf = new PDF('P', 'mm', 'A4');
$control = Sistema::getInstancia();
$pdf->AddPage();

$fechaActual = date("d/m/Y");
$tituloPagina = "";

$idpredio = trim(htmlentities(htmlspecialchars(strip_tags($_GET['idprediofiltro']))));

if($idpredio == ""){
    $idpredio = $_GET['idprediofiltro'];
    $floras = $control->findALlFloras();
    $tituloPagina = "Flora     Fecha: " . $fechaActual;
}  else {
    $floras = $control->findAllFlorasPredio($idpredio);
    $tituloPagina = "Flora del predio  " . $idpredio . "    Fecha: " . $fechaActual;
}

$miCabecera = array('Imagen', 'Nombre', 'Especie', 'Descripcion');

$pdf->tablaVerticalFlora($miCabecera, $floras, $tituloPagina);

$pdf->Output(); //Salida al navegador
?>
