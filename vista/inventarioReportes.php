<?php
include_once('../controlador/PDF.php');
include_once '../controlador/Sistema.php';


$fi = $_POST['fechaInicio'];
$ff = $_POST['fechaFin'];
$idRodal = $_POST['idRodal'];
 
$pdf = new PDF('L');
$control = Sistema::getInstancia();
$pdf->AddPage();

$inventarios = $control->findInventarios($idRodal, $fi, $ff);
$miCabecera = array('Identificador', 'Servicio', 'Sistema Inventario', 'Diáemtro Medio',
            'Altura Dominante','Área Basal', 'Volumen','N° Árboles', 'Altura');
     
$tituloPagina = "Invetarios del Rodal ".$idRodal. " entre las fechas ".$fi." y ".$ff;

$pdf->tablaHorizontalInventario($miCabecera, $inventarios,$tituloPagina);
 
$pdf->Output();
?>
