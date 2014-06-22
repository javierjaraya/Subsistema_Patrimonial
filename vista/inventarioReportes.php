<?php
include_once('../controlador/PDF.php');
include_once '../controlador/Sistema.php';


$fi = $_POST['fechaInicio'];
$ff = $_POST['fechaFin'];
$idRodal = $_POST['idRodal'];
echo $idRodal;  
$pdf = new PDF();
$control = Sistema::getInstancia();
$pdf->AddPage();

//$inventarios = $control->findAllPredios();
$miCabecera = array('Identificador', 'Nombre', 'Superficie', 'Valor');

?>
