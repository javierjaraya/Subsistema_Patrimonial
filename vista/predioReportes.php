<?php
include_once('../controlador/PDF.php');
include_once '../controlador/Sistema.php';
$pdf = new PDF();
$control = Sistema::getInstancia();
$pdf->AddPage();
$predios = $control->findAllPredios();
$miCabecera = array('Identificador', 'Nombre', 'Superficie', 'Valor');
 
$tituloPagina = "Listado de predios";
$pdf->SetAutoPageBreak(TRUE);
$pdf->tablaHorizontalPredio($miCabecera, $predios,$tituloPagina);
 
$pdf->Output(); //Salida al navegador
?>
