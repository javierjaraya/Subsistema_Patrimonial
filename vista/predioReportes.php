<?php
include_once('../controlador/PDF.php');
include_once '../controlador/Sistema.php';
$seleccion = $_GET['seleccionFiltro'];
$seleccionCantidad = $_GET['seleccionCantidad'];

$pdf = new PDF();
$control = Sistema::getInstancia();
$pdf->AddPage();
$predios = $control->findAllPrediosSelection($seleccion, $seleccionCantidad);

$miCabecera = array('Identificador', 'Nombre', 'Superficie', 'Valor','Comuna');
 
$tituloPagina = "Listado de predios";
$pdf->SetAutoPageBreak(TRUE);
$pdf->tablaHorizontalPredio($miCabecera, $predios,$tituloPagina);
 
$pdf->Output(); //Salida al navegador
?>
