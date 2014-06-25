<?php
include_once('../controlador/PDF.php');
include_once '../controlador/Sistema.php';
$pdf = new PDF();
$control = Sistema::getInstancia();
$pdf->AddPage();
$predios = $control->findAllRodales();
$miCabecera = array('Id Predio','Id', 'Manejo', 'Esp.Arbórea', 'Zona Crecimiento', 'Superficie', 'Año Plant.', 'Valor Comercial');
 
$tituloPagina = "Listado de Rodales";
$pdf->tablaHorizontalRodal($miCabecera, $predios, $tituloPagina);
 
$pdf->Output(); //Salida al navegador
?>
