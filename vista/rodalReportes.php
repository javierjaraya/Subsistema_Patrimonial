<?php
include_once('../controlador/PDF.php');
include_once '../controlador/Sistema.php';
$seleccion = $_GET['seleccionFiltro'];
$seleccionCantidad = $_GET['seleccionCantidad'];



$pdf = new PDF();
$control = Sistema::getInstancia();
$pdf->AddPage();
$predios = $control->findAllRodalesSelection($seleccion, $seleccionCantidad);
$fechaActual =  date("d/m/Y"); 
$miCabecera = array('Id Predio','Id Rodal', 'Nombre', 'Manejo', 'Zona Crecimiento','Superficie','Año Plantación');
 
$tituloPagina = "Listado de Rodales al ".$fechaActual;
$pdf->tablaHorizontalRodal($miCabecera, $predios, $tituloPagina);
 
$pdf->Output(); //Salida al navegador
?>
